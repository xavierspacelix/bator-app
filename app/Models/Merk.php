<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merk extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    /**
     * Get all of the motors for the Merk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motors(): HasMany
    {
        return $this->hasMany(Motor::class);
    }


    /**
     * Generate a new UUID for the model.
     */
    public function newUniqueId(): string
    {
        return (string) Uuid::uuid4();
    }
    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    protected static function booted()
    {
        static::creating(function ($mekr) {
            $mekr->slug = Str::slug($mekr->name . '_' . Uuid::uuid4());
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }
}
