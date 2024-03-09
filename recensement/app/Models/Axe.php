<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axe extends Model
{
    use HasFactory;
    protected $fillable = [
        'labelle'
    ];

    public function admins(): HasMany{
        return $this->hasMany(Admin::class);
    }

    public function regions(): HasMany{
        return $this->hasMany(Region::class);
    }
}
