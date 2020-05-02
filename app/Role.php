<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 'Admin';
    const AUTHOR = 'Author';
    const EDITOR = 'Editor';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
