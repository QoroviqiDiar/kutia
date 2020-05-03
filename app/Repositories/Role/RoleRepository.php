<?php


namespace App\Repositories\Role;


use App\Role;

class RoleRepository implements RoleRepositoryInterface
{
    private $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }


    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
