<?php

namespace App\Http\Controllers;

use App\Factories\TransacaoFactory;
use App\Http\Requests\TransferirTransacaoRequest;
use App\Http\Resources\ContaResource;
use App\Models\Conta;
use Illuminate\Http\JsonResponse;

class TransacaoController extends Controller
{
    public function transferir(TransferirTransacaoRequest $request): JsonResponse
    {
        $transacao = TransacaoFactory::getTransacaoMethod($request->validated('forma_pagamento'));
        $conta = Conta::getByIdentificador($request->validated('conta_id'));

        $transacao->transferir($conta, $request->validated('valor'));

        return response()->json(new ContaResource($conta));
    }
}
