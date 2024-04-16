<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'service_status'
    ];

    public function serviceExpert()
    {
        return $this->hasMany(ServiceExpert::class);
    }

}
