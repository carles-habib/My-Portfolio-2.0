<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'martin',
            'first_name' => 'Carles',
            'last_name' => 'Habib',
            'email' => 'martinelpianist@gmail.com',
            'phone_number' => '01200399270',
            'user_type' => 'admin',
            'password' => Hash::make('Martin@2003'), // Never store plain-text passwords
        ]);
    }
}
