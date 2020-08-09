<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PostRepository;
use App\Http\Filters\BodyFilter;
use App\Http\Requests\Api\PostStoreFormRequest;
use App\Http\Services\PostService;


class PostController extends Controller
{
    private $posts;

    /**
     * __Construct
     * 
     * @param PostRepository $posts 
     * @return type
     */

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Description
     * @param PostStoreFormRequest $request 
     * @return type
     */

    public function store(PostStoreFormRequest $request)
    {
        return app(PostService::class)->handle($request->validated());
    }
    
    /**
     * index
     * 
     * if we use with() it's called eager Loading , if we use Load is called Lazy Loading
     * eager work with the query work like get posts with user get first post with user and so on..
     * lazy work after query work after query get all posts load get user for each post
     * 
     * will retrive all posts with global scope that we defing it and 
     * if we want to call it without global scope just right function withoutGlobalScope('scope name may be class name or string') 
     * to avoid all scope just right withoutGlobalScope's'(can pass array here for some scopes that we want)
     * 
     * @return Json
     */
    public function index()
    {
        // return response()->json([
        //     'posts' => $this->posts->with('user')->get()
        // ],201);

        return response()->json([
            'posts' => $this->posts->approved()->filter($this->filters())->load('user')->latest()->get()
        ],201);
    }

    public function filters()
    {
        return [
            'body' => new BodyFilter
        ]
    }
}