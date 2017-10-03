<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Book extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray([
            'name' => $this->name,
            'author' => $this->author,
            'pages' => $this->pages,
            'year' => $this->year,
            'editorial' => $this->editorial,
            'started_in' => $this->whenPivotLoaded('book_user', function () {
                return $this->pivot->started_in;
            }),
            'finished_in' => $this->whenPivotLoaded('book_user', function () {
                return $this->pivot->finished_in;
            }),
            'state' => $this->whenPivotLoaded('book_user', function () {
                return $this->pivot->state;
            }),
            'description' => $this->whenPivotLoaded('book_user', function () {
                return $this->pivot->description;
            }),
        ]);
    }
}
