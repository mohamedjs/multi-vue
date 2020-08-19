<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function it_shouid_return_all_users()
    {
        factory(User::class, 10)->
        $response = $this->get('api/v1/user');
    }
}
