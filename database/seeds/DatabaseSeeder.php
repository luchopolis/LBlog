<?php

use App\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //$this->call(categoriesTableSeeder::class);
        $this->call(postsTableSeeder::class);
    }
}
