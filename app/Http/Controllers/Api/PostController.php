<?php

namespace App\Http\Controllers\API;

use App\Filters\BodyFilter;
use App\Http\Controllers\Controller;
use App\Http\Repositories\PostRepository;
use App\Http\Requests\Api\PostStoreRequest;
use App\Http\Services\PostStoreService;

class PostController extends Controller
{
    private $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts ;
    }

    public function store(PostStoreRequest $request)
    {
        return app(PostStoreService::class)->handle($request->validated());
    }

    public function index()
    {
        return response()->json([
          'posts' => $this->posts->approved()->filter($this->filters())->latest()->get()
        ],200);
    }

    protected function filters()
    {
        return [
            'body' => new BodyFilter
        ];
    }
}