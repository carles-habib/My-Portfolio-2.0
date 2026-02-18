<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;
use Illuminate\Support\Facades\Hash;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'startDate' => '2022/01/01',
            'endDate' => '2022/12/31',
            'title' => 'Faculty of Commmerce',
            'place' => 'BeniSuef',
        ]);
    }
}
