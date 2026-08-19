<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    protected $signature = 'make:admin {name?} {email?}';

    protected $description = 'Crea un usuario administrador';

    public function handle(): int
    {
        $name = $this->argument('name') ?? $this->ask('Nombre del administrador');
        $email = $this->argument('email') ?? $this->ask('Correo electrónico');
        $password = $this->secret('Contraseña');

        if (! $password) {
            $this->error('La contraseña es obligatoria.');

            return Command::FAILURE;
        }

        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);
        $user->is_admin = true;
        $user->save();

        $this->info("Administrador '{$user->name}' creado exitosamente.");
        $this->warn('Credenciales de acceso:');
        $this->line('  URL:   '.config('app.url').'/admin');
        $this->line("  Email: {$user->email}");

        return Command::SUCCESS;
    }
}
