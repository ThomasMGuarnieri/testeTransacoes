<?php

namespace Tests\Integration;

use App\Enums\FormaPagamento;
use App\Services\ContaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\Rule;
use Tests\TestCase;

class UsabilidadeTest extends TestCase
{
    use RefreshDatabase;

    protected function afterRefreshingDatabase()
    {
        // Criar conta com saldo 500
        $this->postJson('/api/conta', [
            'conta_id' => '1234',
            'valor' => 500.00
        ]);
    }

    public function test_verificar_conta_existe(): void
    {
        $response = $this->getJson('/api/conta?id=1234');
        $response->assertStatus(200);
        $response->assertContent('{"conta_id":1234,"saldo":500}');
    }

    public function test_consultar_saldo_conta(): void
    {
        $response = $this->getJson('/api/conta?id=1234');
        $response->assertStatus(200);
        $this->assertEquals(500, $response->json('saldo'));
    }

    public function test_compra_debito(): void
    {
        $response = $this->postJson('/api/transacao', [
            'forma_pagamento' => FormaPagamento::DEBITO->value,
            'conta_id' => '1234',
            'valor' => 50.00,
        ]);
        $response->assertStatus(200);
        $this->assertEquals(448.5, $response->json('saldo'));
    }

    public function test_compra_credito(): void
    {
        $response = $this->postJson('/api/transacao', [
            'forma_pagamento' => FormaPagamento::CREDITO->value,
            'conta_id' => '1234',
            'valor' => 100,
        ]);
        $response->assertStatus(200);
        $this->assertEquals(395, $response->json('saldo'));
    }

    public function test_compra_pix(): void
    {
        $response = $this->postJson('/api/transacao', [
            'forma_pagamento' => FormaPagamento::PIX->value,
            'conta_id' => '1234',
            'valor' => 75.00,
        ]);
        $response->assertStatus(200);
        $this->assertEquals(425, $response->json('saldo'));
    }
}
