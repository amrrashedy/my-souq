<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\subCategory;
use Faker\Generator as Faker;

$factory->define(subCategory::class, function (Faker $faker) {
    return [
        "name" =>$faker->word, 
        "category_id" =>  $faker->randomElement( \App\Category::pluck("id")->toArray()) ,  
        
    ];
});
