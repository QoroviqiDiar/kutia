<?php


namespace App\Repositories\File;


use App\File;
use Illuminate\Support\Facades\Storage;

class FileRepository implements FileRepositoryInterface
{
    private $model;

    public function __construct(File $file)
    {
        $this->model = $file;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function saveFile($file, $request)
    {
        $extension = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $filename = time() . '.' . $extension;
        $file->move(storage_path('app/public'), $filename);

        return $data = [
            'file' => $filename,
            'description' => $request['description'],
            'original_name' => $originalName
        ];
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function delete($file)
    {
        Storage::delete($file->file);
        return $file->delete();
    }
}
