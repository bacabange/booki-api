<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoryCollection;
use App\Models\Book;

/**
 * @resource Story
 *
 * Stories resource, it is a small description of read session
 */
class StoryController extends Controller
{
    /**
     * List book stories of user
     * @param Book $book
     * @return App\Http\Resources\StoryCollection
     */
    public function listUserBookStories(Book $book)
    {
        $user = \Auth::user();
        $stories = $user->books()
            ->where('book_id', $book->id)
            ->first()
            ->stories()
            ->paginate();

        return new StoryCollection($stories);
    }
}
