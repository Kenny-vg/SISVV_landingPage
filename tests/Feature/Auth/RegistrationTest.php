<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * El registro público está deshabilitado en este proyecto:
     * las cuentas se crean únicamente por el panel de administración
     * o el comando `make:admin`.
     */
    public function test_registration_screen_is_disabled(): void
    {
        $this->get('/register')->assertNotFound();
    }
}
