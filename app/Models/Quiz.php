<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
    protected $fillable = [
        'title',
    ];
    
    public function material(): HasOne
    {
        return $this->hasOne(Material::class);
    }
    public function question(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }

}