<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_return_successful(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('index');
    }
}
