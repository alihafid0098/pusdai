<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@pusdai.local');
        $password = env('ADMIN_PASSWORD', 'Pusdai2026!');

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin PUSDAI',
                'password' => Hash::make($password),
            ]
        );
    }
}
