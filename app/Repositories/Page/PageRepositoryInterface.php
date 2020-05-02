<?php


namespace App\Repositories\Page;


interface PageRepositoryInterface
{
    public function getAll();

    public function save($attributes);

    public function update($entity, $attributes);

}
