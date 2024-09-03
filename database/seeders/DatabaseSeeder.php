<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ShopsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UpdateLinksSeeder::class);
        $this->call(PhpQuerySelectorsSeeder::class);
        $this->call(StandardProductParametersTableSeeder::class);
    }
}
