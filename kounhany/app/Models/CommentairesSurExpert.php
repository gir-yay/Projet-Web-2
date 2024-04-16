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
        'commentaire'
    ];

    public function demande()
    {
        return $this->belongsTo(DemandesClient::class);
    }

}
