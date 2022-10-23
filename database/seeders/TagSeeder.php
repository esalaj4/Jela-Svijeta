<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
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

        $tag=Tag::Create([
         'title'=> $faker->fruitName() ,
         'slug' => 'tag'. $order++,
         ]);
 
         $fakerJp = \Faker\Factory::create();
         $fakerJp->addProvider(new \FakerRestaurant\Provider\ja_JP\Restaurant($fakerJp));
         DB::table('tag_translations')->insert(
             [
                 'jp'=>
                 [
                     'locale'=>'jp',
                     'title' => $fakerJp->fruitName(),
                     'tag_id'=>$tag->id, 
                 ]
             ]
        );    
    }
}
