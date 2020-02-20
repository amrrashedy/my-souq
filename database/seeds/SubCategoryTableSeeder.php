<?php

use App\subCategory;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        subCategory::create(["name" => "Test Sub Cat" , "category_id" =>1]);
        subCategory::create(["name" => "Test2 Sub Cat" , "category_id" =>1]);
        subCategory::create(["name" => "Test3 Sub Cat" , "category_id" =>1]);
    }
}
