<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Services;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Services::create([
         'order'=>'1',
         'name'=>'Web Development',
         'brief' => 'Develop creative websites',
         'image'=>'service/service1.png',
         'desc1'=>'Desc1',
         'desc2' =>'Desc2',
         'desc3' =>'Desc3',
         'process'=> 'the process of building websites',
         'processdesc' =>'the process of building websites',
         'objective1'=> 'Develop creative websites',
         'objective2'=> 'Build creative websites',
         'objective3'=> 'Destroy creative websites',
         'objective4'=> 'create creative websites',
         'objective5'=> 'Destroy creative websites',
         'objective6'=> 'build creative websites',
     ]);
    }
}
