<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Seller;
use App\Models\Category;
use App\Models\AdminUser;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = new User();
        $adminUser->name = 'Administrator';
        $adminUser->email = 'admin@domain.com';
        $adminUser->password = Hash::make('password');
        $adminUser->save();

        $adminProfile = new AdminUser();
        $adminProfile->user_id = $adminUser->id;
        $adminProfile->job_title = 'Administrator';
        $adminProfile->save();

        $user = new User();
        $user->name = 'Tester User';
        $user->email = 'tester@domain.com';
        $user->password = Hash::make('password');
        $user->save();


        $sellerUser = new User();
        $sellerUser->name = 'Seller User';
        $sellerUser->email = 'seller@domain.com';
        $sellerUser->password = Hash::make('password');
        $sellerUser->save();

        $seller = new Seller();
        $seller->user_id = $sellerUser->id;
        $seller->save();

        $this->call([
            ProvinceSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            // CategorySeeder::class,
            // MerkSeeder::class,
            // FuelSeeder::class,
            // MotorSeeder::class,
        ]);

        // Category::factory()->count(20)->create();
        // User::factory()->count(15)->create();
    }
}
