<?php

namespace App\Services;

use App\Models\Conta;

class ContaService
{
    public function create(int $identificador): Conta
    {
        $conta = new Conta();
        $conta->identificador = $identificador;
        $conta->save();

        return $conta;
    }
}
