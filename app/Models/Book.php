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
            ->withPivot('started_in', 'finished_in', 'state', 'description')
            ->withTimestamps();
    }

    public function stories()
    {
        return $this->hasMany('App\Models\Story');
    }

    /**
     * Reading Progress of the book
     *
     * @return integer
     */
    public function getProgressAttribute()
    {
        $lastStory = $this->stories()->orderBy('id', 'desc')->first();
        $percentProgress = ($lastStory->page / $this->pages) * 100;
        return round($percentProgress, 2);
    }
}
