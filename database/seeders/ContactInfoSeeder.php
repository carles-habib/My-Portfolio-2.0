<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Singleton table, read with first().
        if (ContactInfo::exists()) {
            return;
        }

        ContactInfo::create([
            'phone' => '01277581584',
            'email' => 'martinhabeeb@icloud.com',
            // Column is NOT NULL; leave blank rather than the literal
            // string 'null' the original seeder wrote.
            'address' => '',
        ]);
    }
}
