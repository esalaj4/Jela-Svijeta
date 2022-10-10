<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\Language;
use Illuminate\Support\Facades\DB;
use Carbon\Language as CarbonLanguage;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
    
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Restaurant($faker));
        $categoryID=\App\Models\Category::all()->pluck('id')->toArray();
         $categoryID[]=null;
         static $order=1;
        return[
         'title'=> $faker->foodName ,
         'slug' => 'meal'. $order++,
         'category_id'=>$categoryID[array_rand($categoryID)] 
         ];
    

       
    }

    
 
}
