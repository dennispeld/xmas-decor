<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\Star;
use App\Shapes\Tree;
use Exception;

class ShapeHelper
{
    // acceptable sizes and number of lines
    public const SIZE = [
        'S' => 5,
        'M' => 7,
        'L' => 11,
    ];

    /**
     * Init the shape by name
     *
     * @param $shapeName
     * @return Shape|null
     */
    private static function initShape($shapeName): ?Shape
    {
        switch ($shapeName) {
            case 'star':
                return new Star();
            case 'tree':
                return new Tree();
            default:
                return null;
        }
    }

    /**
     * Create a shape by name and size
     *
     * @param $shapeName
     * @param $shapeSize
     * @return Shape|null
     * @throws Exception
     */
    public static function getShape($shapeName, $shapeSize): ?Shape
    {
        $shape = self::initShape($shapeName);
        $sizes = array_keys(self::SIZE);

        if (!$shape) {
            return null;
        }

        // if the shape size was not specified or it is not within acceptable sizes, select one randomly
        if (!$shapeSize || !in_array($shapeSize, $sizes, true)) {
            $shapeSize = $sizes[random_int(0, count($sizes) - 1)];
        }

        $shape->setSize($shapeSize);

        return $shape;
    }
}