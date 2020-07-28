<?php

namespace Tests\Unit\Http\Middleware;

use App\Http\Middleware\InjectUserIdIfAuthenticated;
use App\Models\User;
use Auth;
use Tests\TestCase;

class InjectUserIdIfAuthenticatedTest extends TestCase
{       
    /**
     * it_should_render_null_user_if_not_authenticated
     *
     * add user id to any request if user is authenticat , in this function we check that when user not authenticate user id in null and not return error
     * 
     * @return void
     */

     /** @test */ 
    public function it_should_render_null_user_if_not_authenticated()
    {
        Auth::shouldReceive('check')->once()->andReturn(false); // make function auth->check false so will not inject user id , one asseartion for make check false
        $injectUserIdIfAuthenticated = new InjectUserIdIfAuthenticated;
        $injectUserIdIfAuthenticated->handle(request(), function($response) {
            $this->assertNull($response->user_id); // one asseartion for check user id is null
        });
    }

    /**
     * it_should_render_user_id_if_authenticated
     *
     * add user id to any request if user is authenticat , in this function we check that when user authenticate user id is not null and not return error
     * 
     * @return void
     */

     /** @test */ 
    public function it_should_render_user_id_if_authenticated()
    {
        $user = factory(User::class)->make([
            'id'=> 30
        ]);
        // two asseartion, one for make check true , two to inject id with user->id
        Auth::shouldReceive('check')
        ->once()
        ->andReturn(true)
        ->shouldReceive('id')
        ->once()
        ->andReturn($user->id);
        $injectUserIdIfAuthenticated = new InjectUserIdIfAuthenticated;
        $injectUserIdIfAuthenticated->handle(request(), function($response) use ($user) {
            $this->assertEquals($response->user_id, $user->id); //one asseartion for check that inject user id equal to login user id 
        });
    }



}
