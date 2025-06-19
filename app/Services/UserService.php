<?php

namespace App\Services;

use App\Services\Contracts\UserServiceInterface;


class UserService implements UserServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createUser() {
        return 'User created';
    }

    public function destroyUser() {
        return 'User deleted';
    }

    public function updateUser() {
        return 'User updated';
    }
}
