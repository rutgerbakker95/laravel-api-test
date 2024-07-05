<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    /**
     * Test BlogPost.
     */
    public function test_blog_post(): void
    {
        $response = $this->get('/api/posts?user_id=1');

        $response->assertStatus(200);
    }
}
