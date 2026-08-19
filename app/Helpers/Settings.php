<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (! function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        try {
            $settings = Cache::rememberForever('site_settings', function () {
                return Setting::pluck('value', 'key')->toArray();
            });
        } catch (\Throwable $e) {
            // Si la base de datos no está disponible (p. ej. en la página de
            // error 5xx) se devuelve el valor por defecto en lugar de fallar.
            return $default;
        }

        return $settings[$key] ?? $default;
    }
}

if (! function_exists('forget_settings_cache')) {
    function forget_settings_cache(): void
    {
        Cache::forget('site_settings');
    }
}

if (! function_exists('sanitize_html')) {
    /**
     * Sanitiza HTML de contenido de administradores.
     *
     * Permite una lista blanca de etiquetas y atributos, elimina handlers de
     * eventos (on*), esquemas de URL peligrosos (javascript:, vbscript:, data:,
     * file:) y estilos CSS maliciosos. Es la defensa principal contra XSS
     * almacenado en el contenido del CMS.
     */
    function sanitize_html(?string $html): ?string
    {
        if ($html === null || $html === '') {
            return $html;
        }

        $allowedTags = [
            'p', 'br', 'strong', 'em', 'i', 'b', 'u', 'span', 'a',
            'ul', 'ol', 'li', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            'blockquote', 'pre', 'code',
        ];

        $allowedAttributes = [
            'a' => ['href', 'title', 'target', 'rel'],
            'span' => ['style', 'title'],
            'p' => ['style', 'title'],
            'blockquote' => ['style', 'title'],
            'pre' => ['style', 'title'],
            'code' => ['style', 'title'],
            'ul' => ['style', 'title'],
            'ol' => ['style', 'title'],
            'li' => ['style', 'title'],
            'h1' => ['style', 'title'],
            'h2' => ['style', 'title'],
            'h3' => ['style', 'title'],
            'h4' => ['style', 'title'],
            'h5' => ['style', 'title'],
            'h6' => ['style', 'title'],
        ];

        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML(
            '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>'.$html.'</body></html>',
            LIBXML_NOERROR | LIBXML_NOWARNING | LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();

        $body = $dom->getElementsByTagName('body')->item(0);

        if (! $body) {
            return '';
        }

        sanitize_dom_children($body, $allowedTags, $allowedAttributes);

        $result = '';
        foreach ($body->childNodes as $child) {
            $result .= $dom->saveHTML($child);
        }

        return trim($result);
    }
}

if (! function_exists('sanitize_dom_children')) {
    function sanitize_dom_children(DOMNode $node, array $allowedTags, array $allowedAttributes): void
    {
        $children = iterator_to_array($node->childNodes);

        foreach ($children as $child) {
            if (! $child instanceof DOMElement) {
                continue;
            }

            $tag = strtolower($child->tagName);

            if (! in_array($tag, $allowedTags, true)) {
                // Sanitiza primero a los descendientes, luego desempaqueta la
                // etiqueta prohibida (sus hijos se conservan como texto seguro).
                sanitize_dom_children($child, $allowedTags, $allowedAttributes);
                while ($child->firstChild) {
                    $node->insertBefore($child->firstChild, $child);
                }
                $node->removeChild($child);

                continue;
            }

            sanitize_dom_attributes($child, $allowedAttributes[$tag] ?? []);

            sanitize_dom_children($child, $allowedTags, $allowedAttributes);
        }
    }
}

if (! function_exists('sanitize_dom_attributes')) {
    function sanitize_dom_attributes(DOMElement $element, array $allowed): void
    {
        $attributes = iterator_to_array($element->attributes);

        foreach ($attributes as $attribute) {
            $name = strtolower($attribute->name);

            if ($name === 'style') {
                if (! in_array('style', $allowed, true) || ! sanitize_is_style_safe($attribute->value)) {
                    $element->removeAttribute($attribute->name);
                }

                continue;
            }

            if (! in_array($name, $allowed, true)) {
                $element->removeAttribute($attribute->name);

                continue;
            }

            if (in_array($name, ['href', 'src'], true) && ! sanitize_is_url_safe($attribute->value)) {
                $element->removeAttribute($attribute->name);
            }
        }
    }
}

if (! function_exists('sanitize_is_url_safe')) {
    function sanitize_is_url_safe(string $url): bool
    {
        $url = trim($url);

        if ($url === '') {
            return true;
        }

        $lower = strtolower($url);

        foreach (['javascript:', 'vbscript:', 'data:', 'file:', 'blob:'] as $scheme) {
            if (str_starts_with($lower, $scheme)) {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('sanitize_is_style_safe')) {
    function sanitize_is_style_safe(string $style): bool
    {
        $lower = strtolower($style);

        foreach (['expression(', 'javascript:', 'url(', 'import', 'behavior:', '-moz-binding'] as $needle) {
            if (str_contains($lower, $needle)) {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('safe_url')) {
    /**
     * Devuelve la URL únicamente si usa un esquema/forma segura para atributos
     * href (http, https, mailto, tel, rutas relativas o anclas). En cualquier
     * otro caso devuelve '#' para neutralizar esquemas como javascript:.
     */
    function safe_url(string $url): string
    {
        $url = trim($url);

        if ($url === '' || $url === '#') {
            return $url;
        }

        $lower = strtolower($url);

        if (
            str_starts_with($lower, 'http://')
            || str_starts_with($lower, 'https://')
            || str_starts_with($lower, 'mailto:')
            || str_starts_with($lower, 'tel:')
            || str_starts_with($url, '/')
            || str_starts_with($url, '#')
        ) {
            return $url;
        }

        return '#';
    }
}

if (! function_exists('safe_iframe_src')) {
    /**
     * Para src de iframes solo admite URLs http(s). Devuelve '' en otro caso.
     */
    function safe_iframe_src(string $url): string
    {
        $url = trim($url);
        $lower = strtolower($url);

        if (str_starts_with($lower, 'https://') || str_starts_with($lower, 'http://')) {
            return $url;
        }

        return '';
    }
}
