<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContaTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_pode_criar_uma_nova_conta(): void
    {
        $response = $this->post('/api/conta', ['conta_id' => '1234']);

        $response->assertStatus(201);
    }
}
