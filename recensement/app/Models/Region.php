<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'labelle'
    ];
    
    public function axe(): BelongTo{
        return $this->belongsTo(Axe::class);
    }

    public function departements(): HasMany{
        return $this->hasMany(Departement::class);
    }
}
