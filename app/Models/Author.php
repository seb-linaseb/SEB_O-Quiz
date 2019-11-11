<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'app_users';

    public function quiz()
    {
        return $this->hasMany('App\Models\Quiz', 'app_users_id');
    }
}