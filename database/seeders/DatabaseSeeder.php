<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\AdminUser;
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
    }
}
