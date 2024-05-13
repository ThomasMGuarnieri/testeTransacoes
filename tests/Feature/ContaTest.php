<?php

namespace Tests\Feature;

use App\Services\ContaService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContaTest extends TestCase
{
    use RefreshDatabase;

    public ContaService $contaService;

    protected function setUp(): void
    {
        $this->contaService = new ContaService();
        parent::setUp();
    }

    public function test_pode_criar_uma_nova_conta(): void
    {
        $this->contaService->create('1234');

        $this->assertDatabaseCount('contas', 1);
        $this->assertDatabaseHas('contas', ['identificador' => '1234']);
    }

    public function test_pode_criar_conta_com_saldo_inicial(): void
    {
        $this->contaService->create('1234', 25.25);

        $this->assertDatabaseCount('contas', 1);
        $this->assertDatabaseHas('contas', ['identificador' => '1234', 'saldo' => 2525]);
    }
}
