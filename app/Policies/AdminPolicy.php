<?php

namespace App\Policies;

use App\Models\User;

abstract class AdminPolicy
{
    public function viewAny(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function view(User $user, mixed $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function create(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function update(User $user, mixed $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function delete(User $user, mixed $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function deleteAny(User $user): bool
    {
        return (bool) $user->is_admin;
    }

    public function restore(User $user, mixed $model): bool
    {
        return (bool) $user->is_admin;
    }

    public function forceDelete(User $user, mixed $model): bool
    {
        return (bool) $user->is_admin;
    }
}
