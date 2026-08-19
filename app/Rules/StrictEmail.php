<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class StrictEmail implements ValidationRule
{
    /**
     * Valida una dirección de email rechazando caracteres de control
     * (CR/LF y otros) para mitigar inyección de encabezados (CVE-2026-48019)
     * además de la validación de formato estándar.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = (string) $value;

        if (preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F\r\n]/', $email)) {
            $fail('The :attribute contains invalid characters.');
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fail('The :attribute must be a valid email address.');
        }
    }
}
