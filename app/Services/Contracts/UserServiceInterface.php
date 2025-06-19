<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function createUser();
    public function destroyUser();
    public function updateUser();
    
}
