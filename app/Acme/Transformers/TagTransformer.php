<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 12-Feb-2015
 * Time: 12:56
 */

namespace Acme\Transformers;


/**
 * Class TagTransformer
 *
 * This class is used to transform lessons, in JSON format,
 * by explicitly stating which lesson properties to serve up.
 *
 * @package Acme\Transformers
 */
class TagTransformer extends Transformer{


    /**
     * This function transforms a single tag -
     * from JSON format with specified fields.
     *
     * @param $tag A tag
     * @return array Returns an individual tag,
     * according to specified fields.
     */
    public function  transform($tag)
    {
        return [
            'name' => $tag['name']
        ];
    }
}