<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeModelMotor extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
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
        static::creating(function ($merk) {
            $merk->slug = Str::slug($merk->name . '_' . Uuid::uuid4());
        });
    }
    /**
     * Get the merk that owns the Models
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merk(): BelongsTo
    {
        return $this->belongsTo(Merk::class);
    }

    function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")
            ->orWhereHas('merk', function ($query) use ($value) {
                $query->where('name', 'like', "%{$value}%");
            });
    }


    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get all of the motors for the Merk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motors(): HasMany
    {
        return $this->hasMany(Motor::class);
    }
}
