<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
