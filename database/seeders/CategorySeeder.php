<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
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
        $category=Category::Create([
         'title'=> $faker->dairyName() ,
         'slug' => 'category'. $order++,
         ]);
 
         $fakerJp = \Faker\Factory::create();
         $fakerJp->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($fakerJp));
         DB::table('category_translations')->insert(
             [
                 'jp'=>
                 [
                     'locale'=>'jp',
                     'title' => $fakerJp->dairyName(),
                     'category_id'=>$category->id,
                 
                 ]
             ]
                 );
    }
}
