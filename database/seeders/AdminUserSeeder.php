<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if user exists, if so update password, otherwise create
        // Note: The database uses UUIDs and different column names
        $user = User::updateOrCreate(
            ['email' => 'sulaimanfaiztsaqib@gmail.com'],
            [
                'name' => 'Sulaiman Faiz Tsaqib',
                'username' => 'sulaimanfaiz',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'verified' => true,
            ]
        );

        $this->command->info("User {$user->email} created/updated with password 'password'");
    }
}
