<?php


namespace App\Repositories\User;


use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function updateUserRoles($user, $roles)
    {
        return $user->roles()->sync($roles);
    }
}
