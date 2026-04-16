<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Material extends Model
{
    protected $fillable = [
        'title',
        'picture',
        'description',
        'status',
        'user_id',
        'category_id',
    ];

    public function quiz(): HasOne
    {
        return $this->hasOne(Quiz::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}