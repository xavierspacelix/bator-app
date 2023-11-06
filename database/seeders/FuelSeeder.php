<?php

namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuel = Fuel::create([
            'name' => 'Pertalite',
        ]);

        $fuel->save();
        $fuel = Fuel::create([
            'name' => 'Pertamax',
        ]);

        $fuel->save();
        $fuel = Fuel::create([
            'name' => 'Pertamax Turbo',
        ]);

        $fuel->save();
        $fuel = Fuel::create([
            'name' => 'Solar',
        ]);

        $fuel->save();
    }
}
