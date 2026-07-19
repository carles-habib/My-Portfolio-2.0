<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create(
//            [
//            'id' => 1,
//            'title' =>'Deloitte',
//            'description' =>'desc',
//            'category' => 'ui/ux',
//            'client' =>'freelance',
//            'start_date' => '2025/10/2',
//            'designer' =>'cales',
//            'live_url' =>'deliotte.com',
//            'image_path'=>'images/portfolio/portfolio-1.jpg',
//            'is_featured' => '1',
//            ],
            [
                'title' =>'test',
                'description' =>'Brief Description',
                'portfolio_description' =>'a browser extension for Chrome, Firefox, and Edge designed to instantly populate web form fields with random, dummy data',
                'category' => 'Web Design',
                'client' =>'freelance',
                'start_date' => '2025/10/2',
                'designer' =>'carles',
                'live_url' =>'deliotte.com',
                'image_path'=>'images/portfolio/portfolio-1.jpg',
                'thumbnail1'=>'images/portfolio/portfolio-1.jpg',
                'thumbnail2'=>'images/portfolio/portfolio-1.jpg',
                'thumbnail3'=>'images/portfolio/portfolio-1.jpg',
                'story' => 'required|string',
                'approach' => 'required|string'
            ]
        );
    }
}
