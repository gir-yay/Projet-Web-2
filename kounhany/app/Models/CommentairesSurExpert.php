<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentairesSurExpert extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'demande_id',
        'commentaire',
        'client_id',
        'expert_id',
        'afficher',
    ];

    public function demande()
    {
        return $this->belongsTo(DemandesClient::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class, 'expert_id');
    }

}
