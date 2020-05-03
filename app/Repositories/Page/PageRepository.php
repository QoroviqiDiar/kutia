<?php


namespace App\Repositories\Page;


use App\Page;

class PageRepository implements PageRepositoryInterface
{

    /**
     * @var Page
     */
    private $model;

    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    public function getAll()
    {
        $pages = $this->model->all();
        return $pages;
    }

    public function getUserPages($user)
    {
        return $pages = $user->pages()->get();
    }

    public function save($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($entity, $attributes)
    {
        return $entity->update($attributes);
    }

    public function getAllWithPagination($limit = 8)
    {
        return $this->model->paginate($limit);
    }

    public function getAllUserPagesWithPagination($user, $limit = 8)
    {
        return $pages = $user->pages()->paginate($limit);
    }
}
