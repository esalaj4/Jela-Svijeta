<?php

namespace Database\Seeders;

use App\Models\Meal;
use Faker\Provider\Lorem;
use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        foreach (\App\Models\Meal::all() as $index) {
            static $order = 1;
            DB::table('descriptions')->insert(
                [
                    'description' => $faker->sentence(),
                    'meal_id' => $index->id
                ]
            );
    }

}
}