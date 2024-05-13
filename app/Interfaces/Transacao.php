<?php

namespace App\Interfaces;

use App\Models\Conta;

interface Transacao
{
    const TAXA_DEBITO = 3;
    const TAXA_CREDITO = 5;
    const TAXA_PIX = 0;

    public function transferir(Conta $conta, float $valor): Conta;
}
