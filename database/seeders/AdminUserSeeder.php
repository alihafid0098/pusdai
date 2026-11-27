<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@pusdai.com');
        $password = env('ADMIN_PASSWORD');

if (empty($password)) {
    throw new \RuntimeException('ADMIN_PASSWORD wajib diisi.');
}

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin PUSDAI',
                'password' => Hash::make($password),
            ]
        );
    }
}
