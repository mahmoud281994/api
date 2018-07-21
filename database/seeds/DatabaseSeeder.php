<?php

use Illuminate\Database\Seeder;
use App\Model\product;
use App\Model\review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\Model\product::class,50)->create();
        factory(App\Model\review::class,70)->create();
    }
}
