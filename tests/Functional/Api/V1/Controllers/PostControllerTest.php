<?php

namespace App\Functional\Api\V1\Controllers;

use App\TestCase;
use App\User;
use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostControllerTest extends TestCase
{
    use DatabaseMigrations;

    public $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = new User([
            'name' => 'Test',
            'email' => 'test@email.com',
            'password' => '123456'
        ]);
        $this->user->save();
    }

    public function testItShouldAddAPost()
    {
        $post = $this->post('api/post', [
            'title' => 'post title',
            'content' => 'post content'
        ], $this->headers($this->user));

        $post->assertJsonStructure([
            'status'
        ])->assertJson([
            'status' => 'ok'
        ])->assertStatus(200);

        $this->assertEquals(1, Post::count());
        $this->assertEquals(1, Post::where('user_id', $this->user->id)->count());
    }
}
