<?php

namespace App\Services;

use App\Models\Conta;

class ContaService
{
    public function create(int $identificador, float $valor = 0): Conta
    {
        $conta = new Conta();
        $conta->identificador = $identificador;
        $conta->setSaldo($valor);
        $conta->save();

        return $conta;
    }

    public function transferir(Conta $conta, float $valor): void
    {
        if ($conta->getSaldo() < $valor) {
            throw new \DomainException('Saldo insuficiente', 404);
        }

        $conta->setSaldo($valor - $conta->getSaldo());
        $conta->save();
    }
}
