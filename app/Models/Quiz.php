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
    
    public function material(): hasOne
    {
        return $this->hasOne(Material::class);
    }
    public function question(): hasMany
    {
        return $this->hasMany(Question::class);
    }
    public function attempt(): hasMany
    {
        return $this->hasMany(Attempt::class);
    }

}
