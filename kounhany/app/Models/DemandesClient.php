<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandesClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'expert_id',
        'service_id',
        'date_debut',
        'duree',
        'etat'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function commentairesSurExpert()
    {
        return $this->hasMany(CommentairesSurExpert::class);
    }

    public function commentairesSurClient()
    {
        return $this->hasMany(CommentairesSurClient::class);
    }


}
