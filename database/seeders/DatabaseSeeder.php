<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MainSeeder::class);
        $this->call(QuickLinksSeeder::class);
        $this->call([UserSeeder::class]);
        $this->call(RolesSeeder::class);
        $this->call(ContactInfoSeeder::class);
        $this->call(PortfolioImageSeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(ExperiencesSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FunFactsSeeder::class);
        $this->call(PortfolioCategorySeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(StoriesSeeder::class);
    }
}
