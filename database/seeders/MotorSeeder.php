<?php

namespace Database\Seeders;

use App\Models\Motor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motor = Motor::create([
            'name' => $name = 'Motor 1',
            'seller_id' => 1,
            'category_id' => 1,
            'merk_id' => 1,
            'fuel_id' => 3,
            'description' => 'Ini Description',
            'image' => 'exmpale.img',
            'price' => '4000000',
            'kondisi' => 'baru',
            'tahun' => '2020',
            'kapasitas_tank' => '4.2',
            'jarak_tempuh' => '10000',
        ]);

        $motor->slug = Str::slug($name . '_' . $motor->uuid);
        $motor->save();

        $motor = Motor::create([
            'name' => $name = 'Motor 2',
            'seller_id' => 1,
            'category_id' => 1,
            'merk_id' => 1,
            'fuel_id' => 2,
            'description' => 'Ini Description',
            'image' => 'exmpale.img',
            'price' => '4000000',
            'kondisi' => 'baru',
            'tahun' => '2020',
            'kapasitas_tank' => '4.2',
            'jarak_tempuh' => '10000',
        ]);

        $motor->slug = Str::slug($name . '_' . $motor->uuid);
        $motor->save();
    }
}
