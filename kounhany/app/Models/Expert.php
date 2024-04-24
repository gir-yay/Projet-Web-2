<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Expert extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password_',
        'bio',
        'photo',
        'metier',
        'compte_status',
        'status_abonnement',
        'status_payment',
    ];

    public function demandes()
    {
        return $this->hasMany(DemandesClient::class);
    }

    public function commentaires_sur_expert()
    {
        return $this->hasMany(CommentairesSurExpert::class);
    }
    public function commentaires_sur_client()
    {
        return $this->hasMany(CommentairesSurClient::class);
    }

    public function serviceExpert()
    {
        return $this->hasMany(ServiceExpert::class);
    }

    public function paiements()
    {
        return $this->hasMany(Payment::class);
    }





    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
