<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'username'  => 'admin',
            'email'     => 'admin@school.test',
            'full_name' => 'Administrator',
            'password'  => Hash::make('123456'),
            'role'      => UserRole::ADMIN,
        ]);

        for ($i = 1; $i <= 4; $i++) {
            User::create([
                'username'  => "user{$i}",
                'email'     => "lecturer{$i}@school.test",
                'full_name' => "Giảng viên {$i}",
                'password'  => Hash::make('123456'),
                'role'      => UserRole::LECTURER,
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username'  => "user" . ($i + 5),
                'email'     => "student{$i}@school.test",
                'full_name' => "Sinh viên {$i}",
                'password'  => Hash::make('123456'),
                'role'      => UserRole::STUDENT,
            ]);
        }
    }
}
