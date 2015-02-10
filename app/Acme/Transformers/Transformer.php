<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 10-Feb-2015
 * Time: 20:13
 */

namespace Acme\Transformers;

/**
 * Class Transformer
 *
 * This class abstracts responsibilities of transforming
 * JSON data for the API.
 *
 * @package Acme\Transformers
 */
abstract class Transformer {

    /**
     * Function transformCollection
     *
     * This function transforms a collection of items,
     * according to the abstract transform method.
     *
     * @param array $items
     * @return array A collection of items.
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}