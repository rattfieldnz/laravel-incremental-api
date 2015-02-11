<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 11-Feb-2015
 * Time: 22:08
 */

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            DB::table('tags')->insert([
                'name' => $faker->word

            ]);
        }
    }

}