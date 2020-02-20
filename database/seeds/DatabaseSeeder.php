<?php

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
        // $this->call(UsersTableSeeder::class);
       // $this->call(CategoryTableSeeder::class);
        factory(App\category::class, 10)->create();
        factory(App\subCategory::class, 50)->create();
       // $this->call(SubCategoryTableSeeder::class);

       factory(App\product::class, 100)->create();
    }
}
