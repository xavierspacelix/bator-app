<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;

    public $guarded = [];

    /**
     * Get the user that owns the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the motors for the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motors(): HasMany
    {
        return $this->hasMany(Motor::class);
    }
}
