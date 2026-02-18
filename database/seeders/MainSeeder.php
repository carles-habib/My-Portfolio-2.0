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
        DB::table('mains')->insert([
            'name' => 'Iam Carles',
            'title' => 'Web Developer',
            'subtitle' => 'Web Designer',
            'description' => 'specialize in crafting responsive and dynamic web solutions tailored to meet the unique needs of each project.',
        ]);
    }
}
