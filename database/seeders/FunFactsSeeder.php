<?php

namespace Database\Seeders;

use App\Models\FunFact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Make sure to use DB facade


class FunFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         DB::table('fun_facts')->truncate();

        DB::table('fun_facts')->insert([
            // Fun Fact 1: Projects Completed
            [
                'no' => 350,
                'top' => 'Projects',
                'bottom' => 'Completed',
            ],
            // Fun Fact 2: Happy Clients
            [
                'no' => 200,
                'top' => 'Happy',
                'bottom' => 'Clients',
            ],
            // Fun Fact 3: Years Experience
            [
                'no' => 8,
                'top' => 'Years of',
                'bottom' => 'Experience',
            ],
            // Fun Fact 4: Awards Won
            [
                'no' => 15,
                'top' => 'Awards',
                'bottom' => 'Won',
            ],
        ]);
    }
}
