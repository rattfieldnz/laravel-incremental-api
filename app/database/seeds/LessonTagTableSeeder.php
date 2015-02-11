<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LessonTagTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $lessonIds = Lesson::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, count($lessonIds)) as $index)
        {
            DB::table('lesson_tag')->insert([
                'lesson_id' => $faker->randomElement($lessonIds),
                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}