<?php

namespace Tests\Unit\Integration\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Comment;
use Tests\TestCase;

class CommentTest extends TestCase
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
    public function it_should_render_approved_comments_only()
    {
        factory(Comment::class, 3)->create();
        factory(Comment::class, 4)->states('approved')->create();
        $comment = new Comment;
        $this->assertCount(4, $comment->approved()->get());
    }

    /** @test */
    public function it_should_render_diss_approved_comments_only()
    {
        factory(Comment::class, 3)->create();
        factory(Comment::class, 4)->states('approved')->create();
        $comment = new Comment;
        $this->assertCount(3, $comment->dissapproved()->get());
    }
}
