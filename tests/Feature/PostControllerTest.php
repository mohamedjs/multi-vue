<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostControllerTest extends TestCase
{    
    /**
     * is_should_return_a_redirect_if_validation_fails
     *
     * Check Error In Validation and check status id 422 and check that expected error in attrbuite body  (assertJsonValidationErrors)
     * 
     * @return void
     */

    /** @test */
    // public function is_should_return_a_redirect_if_validation_fails()
    // {
    //     $this->post('api/posts', [
    //         'title' => 'new title'
    //     ])->assertStatus(422)->assertJsonValidationErrors([
    //         'body'
    //     ]);
    // }

    /**
     * is_should_create_post_with_user_id_associate_automaticaly_through_middlware
     *
     * create new post with user id about way add user id from middlware dynamic
     * 
     * @return void
     */
    
    /** @test */
    // public function is_should_create_post_with_user_id_associate_automaticaly_through_middlware()
    // {
    //     \Storage::fake();

    //     $this->actingAs(factory(User::class)->create());

    //     $this->post('api/posts', [
    //         'title' => 'new title',
    //         'body'  => 'new body',
    //         'image' => UploadedFile::fake()->image('thread.png')
    //     ])->assertStatus(201);
        
        
    //     $this->assertDatabaseHas('posts', [
    //         'title' => 'new title',
    //         'body'  => 'new body',
    //         'user_id' => auth()->id()
    //     ]);
    // }

    /** @test */
    // public function is_should_return_all_posts_with_user()
    // {
    //     $this->get('api/posts')->assertStatus(201);
    // }

    /** @test */
    // public function is_should_create_post_with_specific_user() 
    // {
    //     \Storage::fake();

    //     $user = factory(User::class)->create();

    //     $data = [
    //         'title' => 'new title',
    //         'body'  => 'new body',
    //         'image' => UploadedFile::fake()->image('thread.png'),
    //     ];

    //     $post = new Post($data);

    //     $post = $post->user()->associate($user);

    //     dd($post);
    // }

    /** @test */

    public function it_shold_render_optional_data()
    {
        $post = factory(Post::class)->create();

        dd($post->user->name);

        dd(optional($post->user)->name);
        
        dd(optional($post->user,function($user){
            return $user->name;
        }));

        dd(tap($post, function($post){
            $post->update([
                'title' => 'hello'
            ]);
        }));

    }

    /** @test */
    public function is_should_return_all_posts_with_filter()
    {
        $this->get('api/posts?body=title')->assertStatus(201);
    }
}
