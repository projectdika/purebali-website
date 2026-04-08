<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = [
        'question_text'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
    public function option(): HasMany
    {
        return $this->hasMany(Option::class);
    }
}
