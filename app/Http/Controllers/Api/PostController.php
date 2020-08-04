<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostStoreRequest;
use App\Http\Services\PostStoreService;

class PostController extends Controller
{
    public function store(PostStoreRequest $request)
    {
        return app(PostStoreService::class)->handle($request->all());
    }
}