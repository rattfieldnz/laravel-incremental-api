<?php

/**
 * Class Lesson
 */
class Lesson extends Eloquent {

    /**
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * @return mixed
     */
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
}
