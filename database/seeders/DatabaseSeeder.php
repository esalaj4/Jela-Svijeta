<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Meal;
use App\Models\Category;
use App\Models\IngredientMeal;
use App\Models\Ingredients;
use App\Models\MealTag;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\MealSeeder;
use Database\Factories\TagFactory;
use Database\Factories\MealFactory;
use Database\Seeders\MealTagSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\IngredientSeeder;
use Database\Seeders\DescriptionSeeder;
use Database\Seeders\IngredientMealSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        for($i = 1; $i < 6; $i++) { 
            $this->call([
             CategorySeeder::class
            ]);
        }  
 
       for($i = 1; $i < 20; $i++) {
             $this->call([
            IngredientSeeder::class,
            TagSeeder::class,
            MealSeeder::class,    
            ]);
        } 
        
        $this->call([
            DescriptionSeeder::class,
            DescriptionTranslationSeeder::class,
        ]); 

        for($i = 1; $i <= 2; $i++) {
            $this->call([
            MealTagSeeder::class,
            IngredientMealSeeder::class
            ]);
        }    
    }
}
