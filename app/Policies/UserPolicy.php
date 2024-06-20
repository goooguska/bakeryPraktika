<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, User $item)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, User $item)
    {
        return true;
    }

    public function delete(User $user, User $item)
    {
        return true;
    }

    public function restore(User $user, User $item)
    {
        return true;
    }

    public function forceDelete(User $user, User $item)
    {
        return true;
    }

    public function massDelete(User $user)
    {
        return true;
    }
}
