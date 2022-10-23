<?php

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/meals', 'App\Http\Controllers\MealController@filter');

