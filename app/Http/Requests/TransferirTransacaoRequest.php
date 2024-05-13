<?php

namespace App\Http\Requests;

use App\Enums\FormaPagamento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferirTransacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'forma_pagamento' => ['required', Rule::enum(FormaPagamento::class)],
            'conta_id' => 'required|integer|exists:contas,identificador',
            'valor' => 'nullable|decimal:0,2|min:0',
        ];
    }
}
