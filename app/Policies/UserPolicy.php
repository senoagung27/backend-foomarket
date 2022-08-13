<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function view(User $user, User $model)
    {
        $user->can('view-users');
    }

    public function index(User $user)
    {
        return $user->can('view-users');
    }
    public function create(User $user)
    {
        return $user->can('create-users');
    }
    public function update(User $user, User $model)
    {
        return $user->can('edit-users') || $user->id == $model->id;
    }
    public function delete(User $user, User $model)
    {
        return $user->can('delete-users') && $user->id !== $model->id;
    }
    public function restore(User $user, User $model)
    {

    }
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
