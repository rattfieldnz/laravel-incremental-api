<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 13-Feb-2015
 * Time: 09:59
 */

use Faker\Factory as Faker;

class ApiTester extends TestCase {

    /**
     * @var \Faker\Generator
     */
    protected $fake;

    /**
     * @var int
     */
    protected $times = 1;

    function __construct()
    {
        $this->fake = Faker::create();
    }


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        $this->app['artisan']->call('migrate');
    }

    /**
     * @param array $lessonFields
     */
    protected function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title' => $this->fake->sentence,
            'body' => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean
        ], $lessonFields);

        while ($this->times--) {
            Lesson::create($lesson);
        }
    }

    /**
     * @param $count
     * @return $this
     */
    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    /**
     * @param $uri
     * @return mixed
     */
    protected function getJson($uri)
    {
        return json_decode($this->call('GET', $uri)->getContent());
    }

    /**
     *
     */
    protected function assertObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach ($args as $attribute) {
            $this->assertObjectHasAttribute($attribute, $object);
        }
    }


}