<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DescriptionTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    static $order = 1;
    $faker = \Faker\Factory::create();
    $faker->addProvider(new \Faker\Provider\Lorem($faker));


    foreach (\App\Models\Meal::all() as $index) {
        DB::table('description_translations')->insert(
            [
                'jp' =>
                ['description'    => $faker->sentence(),
                'description_id' => $order,
                'locale'         => 'jp'],
                'en' =>
                ['description'    => $faker->sentence(),
                'description_id' => $order,
                'locale'         => 'en'],
            ]
        );
        $order++;
        }   
    }
}
