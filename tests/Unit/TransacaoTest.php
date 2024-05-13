<?php

namespace Tests\Unit;

use App\Factories\TransacaoFactory;
use App\Transacoes\CreditoTransacao;
use App\Transacoes\DebitoTransacao;
use App\Transacoes\PixTransacao;
use PHPUnit\Framework\TestCase;

class TransacaoTest extends TestCase
{
    public function test_busca_forma_pagamento_correta(): void
    {
        $this->assertInstanceOf(CreditoTransacao::class, TransacaoFactory::getTransacaoMethod('C'));
        $this->assertInstanceOf(PixTransacao::class, TransacaoFactory::getTransacaoMethod('P'));
        $this->assertInstanceOf(DebitoTransacao::class, TransacaoFactory::getTransacaoMethod('D'));
    }

    public function test_exception_em_forma_de_pagamento_incorreta()
    {
        $this->expectException(\DomainException::class);
        TransacaoFactory::getTransacaoMethod('G');
    }
}
