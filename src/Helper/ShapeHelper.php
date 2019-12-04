<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\Star;
use App\Shapes\Tree;
use App\Shapes\Settings;

class ShapeHelper
{
    public const SIZES = [
        'S' => 5,
        'M' => 7,
        'L' => 11,
    ];

    /**
     * Check if the size was specified and is in acceptable sizes
     * If not, chose one randomly
     *
     * @param $size
     * @return string
     */
    private static function getLines($size): string
    {
        if (!array_key_exists($size, self::SIZES)) {
            $lines = substr(str_shuffle('SML'),0,1);
        } else {
            $lines = self::SIZES[$size];
        }

        return $lines;
    }

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
        $size = self::getLines($shapeSize);
        $shape = self::getShape($shapeName);

        if (!$shape) {
            return null;
        }

        $shape->setSize($size);

        return $shape;
    }
}