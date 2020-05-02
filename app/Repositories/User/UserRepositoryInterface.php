<?php


namespace App\Repositories\User;


interface UserRepositoryInterface
{
    public function getAll();

    public function updateUserRoles($user, $roles);
}
