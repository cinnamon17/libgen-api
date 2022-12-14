<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
        
    //use RefreshDatabase;

    public function test_empty_get_method_send_a_response(){


        $response = $this->getJson('api/v1/title');

        $response->assertStatus(200);
        $response->assertJson([

            'response' => 'success'
        ]);
    }

    public function test_title_endpoint_send_a_response(){


        $title = "how to kill a mockingbird";

        $response = $this->getJson("api/v1/title/{$title}");

        $response->assertStatus(200);
        $response->assertJson([

            'response' => 'success'
        ]);

    }
}
