<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowContaRequest;
use App\Http\Requests\StoreContaRequest;
use App\Http\Resources\ContaResource;
use App\Models\Conta;
use App\Services\ContaService;
use Illuminate\Http\JsonResponse;

class ContaController extends Controller
{
    public ContaService $contaService;
    public function __construct()
    {
        $this->contaService = new ContaService();
    }

    public function show(ShowContaRequest $request): JsonResponse
    {
        $conta = Conta::getByIdentificador($request->validated('id'));

        if (!$conta) {
            return response()->json(['Conta não encontrada'], 404);
        }

        return response()->json(new ContaResource($conta));
    }

    public function store(StoreContaRequest $request): JsonResponse
    {
        $conta = $this->contaService->create(
            $request->validated('conta_id'),
            $request->validated('valor'),
        );

        return response()->json(new ContaResource($conta), 201);
    }
}
