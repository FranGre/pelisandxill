<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Film extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cover(): BelongsTo
    {
        return $this->belongsTo(Cover::class);
    }
}
