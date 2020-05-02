<?php


namespace App\Repositories\Page;


use App\Page;

class PageRepository implements PageRepositoryInterface
{

    public function getAll()
    {
        $pages = Page::all();
        $pages = [];
        return $pages;
    }
}
