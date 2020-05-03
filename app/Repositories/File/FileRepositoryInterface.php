<?php


namespace App\Repositories\File;


interface FileRepositoryInterface
{
    public function getAll();

    public function saveFile($file, $request);

    public function create($attributes);

    public function delete($file);
}
