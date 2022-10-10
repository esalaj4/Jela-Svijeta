<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class MealTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ID = \App\Models\Tag::all()->pluck('id')->toArray();
        foreach (\App\Models\Meal::all()->pluck('id') as $id) {
            DB::table('meal_tag')->insert(
                [
                    'tag_id' => $ID[array_rand($ID)],
                    'meal_id'       => $id,
                ]
            );
        }
    }
}
