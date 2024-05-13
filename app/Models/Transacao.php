<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transacao extends Model
{
    use HasFactory;

    private Conta $conta;

    public function __construct(Conta $conta, array $attributes = [])
    {
        $this->conta = $conta;
        parent::__construct($attributes);
    }

    private function conta(): BelongsTo
    {
        return $this->belongsTo(Conta::class, 'conta_id', 'id');
    }

    public function getConta(): Conta
    {
        return $this->conta;
    }
}
