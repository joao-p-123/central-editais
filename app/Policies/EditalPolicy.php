<?php

namespace App\Policies;

use App\Models\Edital;
use App\Models\User;

class EditalPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Edital $edital): bool
    {
        return $edital->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Edital $edital): bool
    {
        return $edital->user_id === $user->id;
    }

    public function delete(User $user, Edital $edital): bool
    {
        return $edital->user_id === $user->id;
    }
}