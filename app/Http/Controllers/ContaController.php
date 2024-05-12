<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContaRequest;
use App\Services\ContaService;

class ContaController extends Controller
{
    public ContaService $contaService;
    public function __construct()
    {
        $this->contaService = new ContaService();
    }

    public function store(StoreContaRequest $request): void
    {
        $this->contaService->create(
            $request->validated('conta_id'),
            $request->validated('valor')
        );
    }
}
