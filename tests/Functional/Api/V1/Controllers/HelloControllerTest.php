<?php

namespace App\Functional\Api\V1\Controllers;

use App\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class HelloControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testSignUpSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'aldren.terante@gmail.com',
            'password' => bcrypt('1234')
        ]);

        $this->get('api/hello', $this->headers($user))
        ->assertJson([
            'message' => 'Hello World'
        ])
        ->assertStatus(200);
    }
}
