<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function all() : array
    {
        return User::all()->toArray();
    }
}