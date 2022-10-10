<?php

use App\Http\Controllers\meal_controller;
use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Support\Facades\Route;
use Astrotomic\Translatable\Translatable;

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



Route::get('/', 'App\Http\Controllers\MealController@homePage');
       

//Route::get('create', 'App\Http\Controllers\MealController@create')->name('create');


 Route::get('/{locale}', 'App\Http\Controllers\MealController@index');

