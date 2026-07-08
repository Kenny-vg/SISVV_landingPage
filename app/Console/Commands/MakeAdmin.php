<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'make:admin {name?} {email?} {password?}';
    protected $description = 'Crea un usuario administrador';

    public function handle(): int
    {
        $name = $this->argument('name') ?? $this->ask('Nombre del administrador');
        $email = $this->argument('email') ?? $this->ask('Correo electrónico');
        $password = $this->argument('password') ?? $this->secret('Contraseña');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'is_admin' => true,
        ]);

        $this->info("Administrador '{$user->name}' creado exitosamente.");
        $this->warn('Credenciales de acceso:');
        $this->line("  URL:   " . config('app.url') . "/admin");
        $this->line("  Email: {$user->email}");

        return Command::SUCCESS;
    }
}
