<?php

//use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder{

    public function run()
    {
        //$faker = Faker::create();

        //foreach(range(1,30) as $index)
        //{
            User::create([

                'email' => 'example@laravelapi.dev',
                'password' => Hash::make('vagrant')

            ]);
        //}
    }
}
