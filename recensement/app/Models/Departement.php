<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'labelle'
    ];
    public function region(): BelongsTo{
        return $this->belongsTo(Region::class);
    }

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }
}
