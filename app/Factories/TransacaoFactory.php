<?php

namespace App\Factories;

use App\Enums\FormaPagamento;
use App\Interfaces\Transacao;
use App\Transacoes\CreditoTransacao;
use App\Transacoes\DebitoTransacao;
use App\Transacoes\PixTransacao;

class TransacaoFactory
{
    public static function getTransacaoMethod(string $id): Transacao
    {
        $transacaoMethod = FormaPagamento::tryFrom($id);

        if (!$transacaoMethod) {
            throw new \DomainException('Esta forma de pagamento é inválida!', 422);
        }

        return match ($transacaoMethod) {
            FormaPagamento::CREDITO => new CreditoTransacao(),
            FormaPagamento::DEBITO => new DebitoTransacao(),
            FormaPagamento::PIX => new PixTransacao()
        };
    }
}
