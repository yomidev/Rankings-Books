<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 2,
            'password' => Hash::make('pepe')
        ]);
    }
}
