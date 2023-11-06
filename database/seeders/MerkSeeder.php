<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merk = Merk::create([
            'name' => $name = 'Merk 1',
        ]);

        $merk->slug = Str::slug($name . '_' . $merk->uuid);
        $merk->save();
    }
}
