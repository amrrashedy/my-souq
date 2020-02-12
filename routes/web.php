<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use illuminate\http\Request;

Route::get('/', function () {
   return view('master');
});

Route::group(['prefix' => '/category'], function () {
    Route::get('/', 'CategoryController@index');
    Route::post('/add', 'CategoryController@store');   
    Route::get('/delete/{x}', 'CategoryController@destroy');   
    Route::post('/edit', 'CategoryController@edit');   


    
});
Route::group(['prefix' => '/sub_category'], function () {
    Route::get('/', 'SubCategoryController@index');
    Route::post('/add', 'SubCategoryController@store');   
    Route::get('/delete/{x}', 'SubCategoryController@destroy');  
    Route::post('/edit', 'SubCategoryController@edit');   
 
    


    
});

Route::group(['prefix' => '/brand'], function () {
    Route::get('/', 'BrandController@index');
    Route::post('/add', 'BrandController@store');   
    Route::get('/delete/{x}', 'BrandController@destroy');  
    Route::post('/edit', 'BrandController@edit');   


   
    
});

Route::group(['prefix' => '/products'], function () {
    Route::get('/', 'ProductController@index');
    Route::post('/add', 'ProductController@create');   
   
    
});




 







