<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // protected $table = 'story';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'page', 'chapter', 'is_end', 'summary', 'book_id', 'user_id',
    ];

    protected $casts = [
        'is_end' => 'boolean'
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
