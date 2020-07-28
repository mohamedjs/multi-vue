<?php

namespace Tests\Unit\Integration\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{    
    /**
     * setUp
     * 
     * to test first function after that refresh database to test second function to not repeate data
     * 
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }
   
    /**
     * it_should_render_approved_posts_only
     *
     * create posts and check if approved posts is equel 4
     * 
     * @return void
     */

    /** @test */ 
    public function it_should_render_approved_posts_only()
    {
        factory(Post::class, 3)->create();
        factory(Post::class, 4)->states('approved')->create();
        $post = new Post;
        $this->assertCount(4, $post->approved()->get());
    }
   
    /**
     * it_should_render_diss_approved_posts_only
     *
     * create posts and check if not approved is equal 3
     * 
     * @return void
     */

    /** @test */ 
    public function it_should_render_diss_approved_posts_only()
    {
        factory(Post::class, 3)->create();
        factory(Post::class, 4)->states('approved')->create();
        $post = new Post;
        $this->assertCount(3, $post->dissapproved()->get());
    }
}
