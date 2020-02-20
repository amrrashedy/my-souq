<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    $cat_id = $faker->randomElement( \App\Category::pluck("id")->toArray());
    return [
        "name" =>$faker->sentence(3) , 
        //"description" =>$faker->sentence(5),
        "description" =>$faker->paragraph(5),
        "price" =>$faker->numberBetween(10,10000), 
        "qty" =>$faker->randomDigit ,
        "category_id" => $cat_id ,  
        "sub_category_id" =>  
         $faker->randomElement( \App\subCategory::where("category_id" , $cat_id)->pluck("id")->toArray())
        

    ];
});
