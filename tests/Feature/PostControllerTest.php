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
    //     \Storage::fake('local');

    //     $this->actingAs(factory(User::class)->create());

    //     $this->post('api/posts', [
    //         'title' => 'new title',
    //         'body'  => 'new body',
    //         'image' =>  UploadedFile::fake()->image('thread.png')
    //     ])->assertStatus(201);
        
        
    //     $this->assertDatabaseHas('posts', [
    //         'title' => 'new title',
    //         'body'  => 'new body',
    //         'user_id' => auth()->id()
    //     ]);
    // }

    /** @test */
    public function is_should_return_approved_posts_of_specfic_title()
    {
       factory(Post::class, 4)->states('approved')->create([
           'body' => 'title'
       ]);
       
       factory(Post::class, 3)->states('approved')->create([
           'body' => 'mohamed'
       ]);

       $response = $this->get('api/posts?body=mohamed')->assertStatus(200);

       $this->assertEquals(3,count($response->json()['posts']));
    }
}
