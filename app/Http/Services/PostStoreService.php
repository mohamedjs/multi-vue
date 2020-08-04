<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;

class PostStoreService
{    
    /**
     * posts
     *
     * @var PostRepository $posts
     */
    private $posts;
    
    /**
     * __construct
     *
     * @param  PostRepository $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }
    
    /**
     * handle
     *
     * function to handle post request beor create it
     * 
     * @param  PostStoreformRequest $request
     * @return Response
     */
    public function handle($request)
    {
        $this->posts->create($request);
        return response(null, 201);
    }
}