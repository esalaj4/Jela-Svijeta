<?php

use App\Http\Controllers\meal_controller;
use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Support\Facades\Route;
use Astrotomic\Translatable\Translatable;

 Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale)) {
        app()->setLocale($locale);
    }
    return view('meals',[
        'meals' => Meal::latest()->filter(request(['search']))->paginate(10)
   ]); 
}); 
