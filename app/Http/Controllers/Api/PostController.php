<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostStoreRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function store(PostStoreRequest $request)
    {
        Post::create($request->validated());

        return response()->json(null,201);
    }
}