<?php 

namespace App\Http\Repositories;

use App\Models\Post;

class PostRepository
{    
    /**
     * post
     *
     * @var Post
     */
    private $post;
    
    /**
     * __construct
     *
     * @param  Post $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    /**
     * __call
     *
     * @param  function $method
     * @param  mixed $arguments
     * @return func
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->post, $method], $args);
    }
}