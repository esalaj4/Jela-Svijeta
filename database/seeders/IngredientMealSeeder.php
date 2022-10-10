<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class IngredientMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ID = \App\Models\Ingredients::all()->pluck('id')->toArray();
        foreach (\App\Models\Meal::all()->pluck('id') as $id) {
            DB::table('ingredients_meal')->insert(
                [
                    'ingredients_id' => $ID[array_rand($ID)],
                    'meal_id'       => $id,
                ]
            );
        }
    }
}
