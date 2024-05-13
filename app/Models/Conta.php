<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    public function setSaldo(float $valor): void
    {
        $this->saldo = $valor * 100;
    }

    public function getSaldo(): float
    {
        return $this->saldo / 100;
    }
}
