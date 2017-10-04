<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateBookRequest;
use App\Http\Requests\Api\EditBookRequest;
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

        $book->users()->attach([
            $user->id => [
                'started_in' => $request->get('started_in'),
                'finished_in' => $request->get('finished_in'),
                'state' => 'in_progress',
                'description' => $request->get('description')
            ]
        ]);

        return new BookResource($book);
    }

    public function update(Book $book, EditBookRequest $request)
    {
        $user = \Auth::user();

        $user->books()->updateExistingPivot($book->id, [
            'started_in' => $request->get('started_in'),
            'finished_in' => $request->get('finished_in'),
            'state' => $request->get('state'),
            'description' => $request->get('description')
        ]);

        return new BookResource($book);
    }
}
