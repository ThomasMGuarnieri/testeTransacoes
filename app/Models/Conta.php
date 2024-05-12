<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    public string $identificador;
    private int $valor;

    use HasFactory;

    public function setValor(float $valor): void
    {
        $this->valor = $valor * 100;
    }

    public function getValor(): float
    {
        return $this->valor / 100;
    }
}
