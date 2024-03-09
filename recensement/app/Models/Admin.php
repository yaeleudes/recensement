<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable as IlluminateAuthenticatableContract;

class Admin extends Authenticatable implements IlluminateAuthenticatableContract
{
    use HasFactory, Notifiable, HasApiTokens;

    public function axe(): BelongsTo{
        return $this->belongsTo(Axe::class);
    }

    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'matricule',
        'role',
        'mon_axe',
        'email',
        'password',
    ];
}
