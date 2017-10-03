<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateBookRequest;
use App\Http\Resources\Book as BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(CreateBookRequest $request)
    {
        $user = \Auth::user();
        $book = new Book;

        $book->fill($request->only('name', 'author', 'pages', 'year', 'editorial'));
        $book->save();

        $user->books()->attach([
            $book->id => [
                'started_in' => $request->get('started_in'),
                'finished_in' => $request->get('finished_in'),
                'state' => 'in_progress',
                'description' => $request->get('description')
            ]
        ]);

        return new BookResource($book);
    }
}
