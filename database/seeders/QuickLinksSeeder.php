<?php

namespace Database\Seeders;

use App\Models\QuickLinks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuickLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        QuickLinks::insert([
            'file_path' => null,
            'ig' => null,
            'youtube' => null,
            'linkedin' => null,
            'github' => null,
        ]);
    }
}
