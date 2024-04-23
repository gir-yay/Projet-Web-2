<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentairesSurClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'demande_id',
        'commentaire',
        'client_id',
        'expert_id',
    ];

    public function demande()
    {
        return $this->belongsTo(DemandesClient::class);
    }



}
