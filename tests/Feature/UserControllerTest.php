<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function it_shouid_return_all_users()
    {
        $response = $this->get('api/v1/users?name=m&email=n');
        $this->assertEquals(6,count($response->json()['data']['users']));
    }
}
