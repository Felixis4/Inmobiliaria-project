<?php

namespace Tests\Feature;

use App\Models\Query;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QueryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_status(): void
    {
        $response = $this->get('/query');

        $response->assertStatus(302);
    }
    public function test_store_query()
    {
        $query = $this->Createquery();
        $this->assertDatabaseHas('queries',$query->toArray());
    }

    private function Createquery(): mixed
    {
        $query = Query::factory()->create();
        return $query;
    }
}
