<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conta extends Model
{
    use HasFactory;
    public string $identificador;
    private int $saldo;

    public function transacoes(): HasMany
    {
        return $this->hasMany(Transacao::class, 'conta_id', 'id');
    }

    public function getSaldo(): float
    {
        return $this->saldo / 100;
    }
}
