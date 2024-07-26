<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trailer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function film(): HasOne
    {
        return $this->hasOne(Film::class);
    }
}
