<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\User;

class AccountPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function before(User $user)
    {
        return true;
    }

    public function view(User $user, Account $model)
    {
        return $user->id == $model->user_id;
    }

    public function destroy(User $user, Account $model)
    {
        return $user->id == $model->user_id;
    }

    public function index(User $user, Account $model)
    {
        return $user->id == $model->user_id;
    }

    public function delete(User $user, Account $model)
    {
        return $user->id == $model->user_id;
    }
}
