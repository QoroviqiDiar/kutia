<?php


namespace App\Repositories\Page;


interface PageRepositoryInterface
{
    public function getAll();

    public function getUserPages($user);

    public function getAllWithPagination($limit = 8);

    public function getAllUserPagesWithPagination($user, $limit = 8);

    public function save($attributes);

    public function update($entity, $attributes);

    public function delete($entity);

}
