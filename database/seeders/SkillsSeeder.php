<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Skills;
use App\Models\User;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Skills::create([
         'name' => 'PHP',
         'user_id' => User::query()->value('id'),
         'image' => 'skills/html.png'

     ]);
    }
}
