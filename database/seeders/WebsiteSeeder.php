<?php

namespace Database\Seeders;

use App\Models\Website\Website;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Website::factory()->count(5)->create();
    }
}
