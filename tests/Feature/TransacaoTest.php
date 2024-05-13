<?php

namespace Tests\Feature;

use App\Services\ContaService;
use App\Transacoes\CreditoTransacao;
use App\Transacoes\DebitoTransacao;
use App\Transacoes\PixTransacao;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransacaoTest extends TestCase
{
    use RefreshDatabase;

    public ContaService $contaService;

    protected function setUp(): void
    {
        $this->contaService = new ContaService();
        parent::setUp();
    }

    public function test_trasferir_pix(): void
    {
        $conta = $this->contaService->create('1234', 500);
        $transacao = new PixTransacao();

        $transacao->transferir($conta, 100.00);

        $this->assertEquals(400.00, $conta->getSaldo());
    }

    public function test_trasferir_credito(): void
    {
        $conta = $this->contaService->create('1234', 500);
        $transacao = new CreditoTransacao();

        $transacao->transferir($conta, 100.00);

        $this->assertEquals(395.00, $conta->getSaldo());
    }

    public function test_trasferir_debito(): void
    {
        $conta = $this->contaService->create('1234', 500);
        $transacao = new DebitoTransacao();

        $transacao->transferir($conta, 100.00);

        $this->assertEquals(397.00, $conta->getSaldo());
    }

    public function test_trasferir_sem_saldo_pix(): void
    {
        $this->expectException(\DomainException::class);

        $conta = $this->contaService->create('1234', 100);
        $transacao = new PixTransacao();

        $transacao->transferir($conta, 200.00);
    }
}
