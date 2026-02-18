<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stories;

use Spatie\Permission\Models\Role;
class StoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stories::create([
            'name'=>'Martin',
            'description'=>'old clients may last with a good deal',
            'jobtitle'=>'CEO',
            'coname'=>'Fasa7ni'
        ]);
    }
}
