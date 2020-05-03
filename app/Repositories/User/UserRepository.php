<?php


namespace App\Repositories\User;


use App\Repositories\Role\RoleRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    private $roleRepository;

    public function __construct(User $user, RoleRepositoryInterface $roleRepository)
    {
        $this->model = $user;
        $this->roleRepository = $roleRepository;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function updateUserRoles($user, $roles)
    {
        return $user->roles()->sync($roles);
    }

    public function create($attributes, $roles)
    {
        $user = $this->model->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password'])
        ]);
        foreach ($roles as $roleId) {
            $role = $this->roleRepository->findById($roleId);
            $user->roles()->attach($role);
        }
    }
}
