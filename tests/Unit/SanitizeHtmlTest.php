<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SanitizeHtmlTest extends TestCase
{
    public function test_strips_event_handlers(): void
    {
        $this->assertSame(
            '<p>Hola</p>',
            sanitize_html('<p onclick="alert(1)">Hola</p>')
        );
    }

    public function test_removes_javascript_urls(): void
    {
        $this->assertSame(
            '<a>link</a>',
            sanitize_html('<a href="javascript:alert(document.cookie)">link</a>')
        );
    }

    public function test_unwraps_script_tags(): void
    {
        $result = sanitize_html('<script>alert(1)</script><p>ok</p>');

        $this->assertStringNotContainsString('<script', $result);
        $this->assertStringContainsString('<p>ok</p>', $result);
    }

    public function test_keeps_safe_html(): void
    {
        $this->assertSame(
            '<h2>Bienvenido</h2><br><strong>ok</strong>',
            sanitize_html('<h2>Bienvenido</h2><br><strong>ok</strong>')
        );
    }

    public function test_removes_unsafe_style(): void
    {
        $this->assertSame(
            '<span>texto</span>',
            sanitize_html('<span style="background:url(javascript:alert(1))">texto</span>')
        );
    }

    public function test_keeps_safe_style(): void
    {
        $this->assertSame(
            '<span style="font-style: italic;">texto</span>',
            sanitize_html('<span style="font-style: italic;">texto</span>')
        );
    }

    public function test_keeps_safe_links(): void
    {
        $this->assertSame(
            '<a href="https://ok.com" target="_blank">safe</a>',
            sanitize_html('<a href="https://ok.com" target="_blank">safe</a>')
        );
    }

    public function test_returns_null_and_empty_as_is(): void
    {
        $this->assertNull(sanitize_html(null));
        $this->assertSame('', sanitize_html(''));
    }
}
