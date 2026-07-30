<?php

namespace Database\Seeders;

use App\Models\Main;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // `mains` is a singleton the app reads with first() — only seed the
        // defaults when it is empty, so re-seeding never duplicates or
        // overwrites hero text that has been edited through the admin panel.
        if (DB::table('mains')->exists()) {
            return;
        }

        DB::table('mains')->insert([
            'name' => 'Iam Carles',
            'title' => 'Web Developer',
            'subtitle' => 'Web Designer',
            'description' => 'specialize in crafting responsive and dynamic web solutions tailored to meet the unique needs of each project.',
        ]);
    }
}
