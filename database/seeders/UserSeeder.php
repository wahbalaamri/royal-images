<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => "Admin",
            'f_name_ar' => "Admin",
            's_name_ar' => "Admin",
            't_name_ar' => "Admin",
            'l_name_ar' => "Admin",
            'f_name_en' => "Admin",
            's_name_en' => "Admin",
            't_name_en' => "Admin",
            'l_name_en' => "Admin",
            'job_title_ar' => "Admin",
            'job_title_en' => "Admin",
            'email' => "admin@diwan.gov.om",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
        ])->assignRole('admin', 'viewer','dataEntry');
    }
}
