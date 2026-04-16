<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    public function attempt(): BelongsTo
    {
        return $this->belongsTo(Attempt::class);
    }
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }
}