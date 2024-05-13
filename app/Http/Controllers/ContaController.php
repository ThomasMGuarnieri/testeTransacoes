<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContaRequest;
use App\Http\Resources\ContaResource;
use App\Services\ContaService;

class ContaController extends Controller
{
    public ContaService $contaService;
    public function __construct()
    {
        $this->contaService = new ContaService();
    }

    public function store(StoreContaRequest $request)
    {
        $conta = $this->contaService->create(
            $request->validated('conta_id'),
        );

        return response()->json(new ContaResource($conta), 201);
    }
}
