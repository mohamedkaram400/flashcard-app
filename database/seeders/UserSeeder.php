<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['id' => 1],
            [
                'name'  => 'Admin',
                'username'  => 'admin',
                'phone'  => '012020952',
                'email'  => 'admin@gmail.com',
                'password' => Hash::make('qazwsx123'),
                'isAdmin'  => true,
            ]
        );
    }
}
