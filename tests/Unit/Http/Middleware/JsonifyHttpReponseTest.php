<?php

namespace Tests\Unit\Http\Middleware;

use \App\Http\Middleware\JsonifyHttpReponse;
use Tests\TestCase;

class JsonifyHttpReponseTest extends TestCase
{       
    /**
     * it_should_render_accept_in_middleware_to_be_application_json
     *
     * check that JsonifyHttpReponse middlware if we use it the content of request or response is application/json and header of request append to it accept=>application/json
     * 
     * @return void
     */

    /** @test */ 
    public function it_should_render_accept_in_middleware_to_be_application_json()
    {
        $jsonifyHttpResponse = new JsonifyHttpReponse;
        $jsonifyHttpResponse->handle(request(), function($response) {
            $this->assertEquals('application/json', $response->headers->get('Accept'));
        });
    }

}
