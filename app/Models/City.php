<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $searchableColumns = ['code', 'name', 'province.name'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'city_code', 'code');
    }

    public function villages()
    {
        return $this->hasManyThrough(
            Village::class,
            District::class,
            'city_code',
            'district_code',
            'code',
            'code'
        );
    }

    public function getProvinceNameAttribute()
    {
        return $this->province->name;
    }

    public function users()
    {
        return $this->hasMany(User::class, 'city_id');
    }
}
