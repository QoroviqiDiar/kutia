<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    public $fillable = [
        'description',
        'file',
        'original_name'
    ];

    public function getFilePath($fileName)
    {
        return Storage::url($fileName);
    }
}
