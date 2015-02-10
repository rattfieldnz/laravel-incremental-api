<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 10-Feb-2015
 * Time: 20:17
 */

namespace Acme\Transformers;

/**
 * Class LessonTransformer
 *
 * This class is used to transform lessons, in JSON format,
 * by explicitly stating which lesson properties to serve up.
 *
 * @package Acme\Transformers
 */
class LessonTransformer extends Transformer{


    /**
     * This function transforms a single lesson -
     * from JSON format with specified fields.
     *
     * @param $item A lesson
     * @return array Returns an individual lesson,
     * according to specified fields.
     */
    public function  transform($item)
    {
        return [
            'title' => $item['title'],
            'body' => $item['body'],
            'active' => (boolean)$item['some_bool']
        ];
    }
}