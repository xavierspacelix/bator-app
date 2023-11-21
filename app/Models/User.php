<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Ramsey\Uuid\Uuid;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'no_handphone',
        'gender',
        'avatar',
        'bio',
        'dateofbirth',
        'city_code',
        'district_code',
        'village_code',
        'province_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
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

    /**
     * Get the admin user associated with the user.
     */
    public function adminUser()
    {
        return $this->hasOne(AdminUser::class);
    }

    function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
    }



    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public static function isSeller()
    {
        return static::whereHas('seller')->get();
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_code', 'code');
    }

    /**
     * Get all of the socialAccounts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialAccounts(): HasMany
    {
        return $this->hasMany(SocialAccount::class);
    }
}
