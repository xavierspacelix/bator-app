<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $fillable = ['platform', 'username']; // Atau gunakan $guarded dengan pengecualian yang sesuai

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
