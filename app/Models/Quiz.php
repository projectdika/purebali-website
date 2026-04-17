<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'material_id',
    ];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }

}
