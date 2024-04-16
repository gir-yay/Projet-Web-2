<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceExpert extends Model
{
    use HasFactory;
    protected $fillable = [
        'expert_id',
        'service_id',
        'nbr_annee_d_exp',
        'disponibilite',
        'duree',
        'prix_par_duree',
        'ville',
        'status_'
    ];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
