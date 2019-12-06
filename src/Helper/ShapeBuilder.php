<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\StarPattern;
use App\Shapes\TreePattern;
use Exception;

class ShapeBuilder
{
    public const SIZE = [
        'S' => 5,
        'M' => 7,
        'L' => 11,
    ];

    /**
     * Initialize a shape
     *
     * @param string $name
     * @param string|null $size
     * @return array|null
     * @throws Exception
     */
    public static function initShape($name, $size): ?Shape
    {
        $size = self::initSize($size);

        switch ($name) {
            case 'star':
                $pattern = new StarPattern($size);
                break;
            case 'tree':
                $pattern = new TreePattern($size);
                break;
            default:
                return null;
        }

        return new Shape($pattern);
    }

    /**
     * Initialize the size of a shape: formats if exists, picks a random one if doesn't exist
     *
     * @param string|null $size
     * @return string
     * @throws Exception
     */
    private static function initSize($size): string
    {
        $size = strtoupper($size);
        $sizes = array_keys(self::SIZE);

        // if the shape size was not specified or it is not within acceptable sizes, select one randomly
        if (!$size || !array_key_exists($size, self::SIZE)) {
            $size = $sizes[random_int(0, count($sizes) - 1)];
        }

        return $size;
    }
}