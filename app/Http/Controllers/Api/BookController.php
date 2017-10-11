<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateBookRequest;
use App\Http\Requests\Api\EditBookRequest;
use App\Http\Requests\Api\CreateStoryRequest;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\Story as StoryResource;
use App\Models\Book;
use App\Models\Story;

/**
 * @resource Book
 *
 * Book resource
 */
class BookController extends Controller
{
    /**
     * Create new book
     * @param CreateBookRequest $request
     * @return App\Http\Resources\Book
     */
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
    /**
     * Update book
     * @param Book $book
     * @param EditBookRequest $request
     * @return App\Http\Resources\Book
     */
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

    /**
     * Create book story
     * @param Book $book
     * @param CreateStoryRequest $request
     * @return App\Http\Resources\Story
     */
    public function createStory(Book $book, CreateStoryRequest $request)
    {
        $user = \Auth::user();
        $story = new Story($request->only('date', 'page', 'chapter', 'is_end', 'summary'));
        $story->book()->associate($book);
        $story->user()->associate($user);
        $story->save();

        if ($story->is_end) {
            $user = \Auth::user();

            $book_user = $user->books()->where('book_id', $book->id)->first();
            $book_user->pivot->state = 'finished';
            $book_user->pivot->save();
        }

        return new StoryResource($story);
    }
}
