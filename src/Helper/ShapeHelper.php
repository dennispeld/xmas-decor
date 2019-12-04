<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\Star;
use App\Shapes\Tree;

class ShapeHelper
{
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
     */
    public static function initShape($shapeName, $shapeSize): ?Shape
    {
        $shape = self::getShape($shapeName);

        if (!$shape) {
            return null;
        }

        $shape->setSize($shapeSize);

        return $shape;
    }
}