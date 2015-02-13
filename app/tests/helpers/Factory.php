<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 13-Feb-2015
 * Time: 13:51
 */

trait Factory {

    /**
     * @var int
     */
    protected $times = 1;

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
     * @param $type
     * @param array $fields
     */
    protected function make($type, array $fields = [])
    {
        while($this->times--)
        {
            $stub = array_merge($this->getStub(), $fields);
            $type::create($stub);
        }
    }

    /**
     *
     */
    protected function getStub()
    {
        throw new BadMethodCallException('Create your own getStub method to declare your fields.');
    }
}