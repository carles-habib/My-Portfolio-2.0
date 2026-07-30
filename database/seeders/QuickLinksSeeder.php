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
        // Singleton table, read with first(). Seeding an empty placeholder row
        // a second time would shadow nothing but still break the admin panel's
        // assumption that exactly one row exists.
        if (QuickLinks::exists()) {
            return;
        }

        QuickLinks::insert([
            'file_path' => null,
            'ig' => null,
            'youtube' => null,
            'linkedin' => null,
            'github' => null,
        ]);
    }
}
