<?php
namespace App\Repositories\Model;

use App\Repositories\EloquentRepository;
use App\User;

class UserRepository extends EloquentRepository
{
    public function getModel()
    {
        return User::class;
    }
}
