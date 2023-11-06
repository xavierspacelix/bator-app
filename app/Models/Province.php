<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';


    public function cities()
    {
        return $this->hasMany(City::class, 'province_code', 'code');
    }

    public function districts()
    {
        return $this->hasManyThrough(
            District::class,
            City::class,
            'province_code',
            'city_code',
            'code',
            'code'
        );
    }

    public function users()
    {
        return $this->hasMany(User::class, 'province_id');
    }
}
