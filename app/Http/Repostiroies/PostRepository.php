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
     * @param  mixed $name
     * @param  mixed $arguments
     * @return void
     */
    public function __call($name, $arguments)
    {
        $this->post->$name(...$arguments);
    }
}