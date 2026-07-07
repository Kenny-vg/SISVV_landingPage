<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PdfMaxPages implements ValidationRule
{
    public function __construct(
        protected int $maxPages = 8
    ) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!($value instanceof UploadedFile)) {
            return;
        }

        $content = file_get_contents($value->getPathname());
        preg_match_all('/\/Type\s*\/Page[^s]/', $content, $matches);
        $count = count($matches[0] ?? []);

        if ($count > $this->maxPages) {
            $fail("El PDF tiene {$count} páginas. El máximo permitido es {$this->maxPages}.");
        }
    }
}
