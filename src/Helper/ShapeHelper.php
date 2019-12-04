<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\Star;
use App\Shapes\Tree;
use Exception;

class ShapeHelper
{
    public const SIZE = [
        'S' => 5,
        'M' => 7,
        'L' => 11
    ];

    private static function getShape($shapeName): ?Shape
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
    public static function initShape($shapeName, $shapeSize): ?Shape
    {
        $shape = self::getShape($shapeName);

        if (!$shape) {
            return null;
        }

        // if the shape size was not specified, select one randomly
        if (!$shapeSize) {
            $sizes = array_keys(self::SIZE);
            $shapeSize = $sizes[random_int(0, count($sizes) - 1)];
        }

        $shape->setSize($shapeSize);

        return $shape;
    }
}