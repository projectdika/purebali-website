<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attempt extends Model
{
    protected $fillable = [
        'score',
        'started_at',
        'finish_at',
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
