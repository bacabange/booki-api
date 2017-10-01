<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'pages', 'year', 'editorial',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'book_user', 'book_id', 'user_id')
            ->withPivot('started_in', 'finished_in', 'state', 'description');
    }
}
