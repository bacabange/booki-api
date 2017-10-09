<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateStoryRequest;
use App\Models\Story;
use App\Http\Resources\Story as StoryResource;

class StoryController extends Controller
{
    public function store(CreateStoryRequest $request)
    {
        $story = new Story;
        $story->fill($request->only('date', 'page', 'chapter', 'is_end', 'summary', 'book_id'));
        $story->save();

        if ($story->is_end) {
        }

        return new StoryResource($story);
    }
}
