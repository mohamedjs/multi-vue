<?php

namespace Tests\Unit\Integration\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{    
    /**
     * setUp
     * to test first function after that refresh database to test second function to not repeate data
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
    }

    /** @test */
    public function it_should_render_approved_posts_only()
    {
        factory(Post::class, 3)->create();
        factory(Post::class, 4)->states('approved')->create();
        $post = new Post;
        $this->assertCount(4, $post->approved()->get());
    }

    /** @test */
    public function it_should_render_diss_approved_posts_only()
    {
        factory(Post::class, 3)->create();
        factory(Post::class, 4)->states('approved')->create();
        $post = new Post;
        $this->assertCount(3, $post->dissapproved()->get());
    }
}
