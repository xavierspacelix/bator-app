<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fuel extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the motors for the Fuel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motors(): HasMany
    {
        return $this->hasMany(Motor::class);
    }
}
