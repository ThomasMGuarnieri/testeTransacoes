<?php

namespace App\Transacoes;

use App\Interfaces\Transacao;
use App\Models\Conta;
use App\Services\ContaService;

class DebitoTransacao implements Transacao
{
    private ContaService $contaService;
    public function __construct()
    {
        $this->contaService = new ContaService();
    }

    public function transferir(Conta $conta, float $valor): Conta
    {
        $this->contaService->transferir($conta, $valor * ((100 - self::TAXA_DEBITO) / 100));
        return $conta;
    }
}
