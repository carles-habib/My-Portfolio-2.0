<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;
use Illuminate\Support\Facades\Hash;

class ExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'startDate' => '2022/01/01',
            'endDate' => '2022/12/31',
            'title' => 'Full-stack developer',
            'place' => 'El-Minya',
        ]);
    }
}
