<?php
/**
 * Created by PhpStorm.
 * Post: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Http\Repositories\PostRepository;

class PostService
{

    const IMAGE_PATH = 'public/images';
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostServices constructor.
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository  = $postRepository;
    }

   public function handle($request)
   {
       $this->postRepository->create(
           array_merge($request,[
               'image' => $this->handleFileUpload($request['image'])->getFileName()
           ])
       );
       return response(null, 201);
   }

   public function handleFileUpload($file)
   {
       return (new LocalFileUploadService($file))->save(self::IMAGE_PATH);
   }
}
