<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Restaurant($faker));
        static $order=1;
        $ingredient=Ingredients::Create([
         'title'=> $faker->dairyName() ,
         'slug' => 'ingredient'. $order++,
         ]);
 
         $fakerJp = \Faker\Factory::create();
         $fakerJp->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($fakerJp));
         DB::table('ingredients_translations')->insert(
             [
                 'jp'=>
                 [
                     'locale'=>'jp',
                     'title' => $fakerJp->dairyName(),
                     'ingredients_id'=>$ingredient->id,
                 
                 ],
             ]
        );
    }
}
