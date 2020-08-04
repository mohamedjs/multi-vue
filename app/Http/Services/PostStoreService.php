<?php

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;

class PostStoreService
{    
    const IMAGE_PATH = "public/images" ;

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
        $this->posts->create(
            array_merge($request, [
                'image' => $this->handleFileUpload($request['image'])->getFileName()
            ])
        );
        return response(null, 201);
    }

    protected function handleFileUpload($file)
    {
        return (new LocalFileUploadService($file))->save(self::IMAGE_PATH);
    }
}