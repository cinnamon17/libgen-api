<?php

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    
    public function test_author_send_a_response()
    {
        $response = $this->get('api/v1/author');

        $response->assertJson([

            "response" => "success"
        ]);
    }

    public function test_author_with_parameters_send_a_response()
    {
        $author = "Tony Clink";

        $response = $this->get("api/v1/author/{$author}");

        $response->assertJson([

            "response" => "success"

        ]);
    }
}
