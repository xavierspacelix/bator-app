<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Motor extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];

    /**
     * Get the seller that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }


    /**
     * Get the category that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the merk that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merk(): BelongsTo
    {
        return $this->belongsTo(Merk::class);
    }

    /**
     * Get the fuel that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuel(): BelongsTo
    {
        return $this->belongsTo(Fuel::class);
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
        static::creating(function ($motor) {
            $motor->slug = Str::slug($motor->name . '_' . Uuid::uuid4());
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
        $query->where('name', 'like', "%{$value}%")
            ->orWhere('kondisi', 'like', "%{$value}%")
            ->orWhereHas('category', function ($query) use ($value) {
                $query->where('name', 'like', "%{$value}%");
            })
            ->orWhereHas('merk', function ($query) use ($value) {
                $query->where('name', 'like', "%{$value}%");
            });
    }
}
