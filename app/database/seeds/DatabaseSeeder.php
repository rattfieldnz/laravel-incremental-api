<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
            Lesson::truncate();
			User::truncate();

            Eloquent::unguard();

            $this->call('LessonsTableSeeder');
			$this->call('UsersTableSeeder');
	}

}
