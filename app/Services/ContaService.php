<?php

namespace App\Services;

use App\Models\Conta;

class ContaService
{
    public function create(int $identificador, float $valor): Conta
    {
        $conta = new Conta();
        $conta->identificador = $identificador;
        $conta->setValor($valor);
        $conta->save();

        return $conta;
    }
}
