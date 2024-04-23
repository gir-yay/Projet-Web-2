<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'expert_id',
        'montant',
        'methode',
        'transaction_id',
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
}
