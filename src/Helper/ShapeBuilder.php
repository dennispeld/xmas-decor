<?php

namespace App\Helper;

use App\Shapes\Shape;
use App\Shapes\ShapeSettings;
use App\Shapes\StarPattern;
use App\Shapes\TreePattern;
use Exception;

class ShapeBuilder
{
    /**
     * Initialize a shape
     *
     * @param string $name
     * @param int|null $size
     * @return array|null
     * @throws Exception
     */
    public static function initShape($name, $size): ?Shape
    {
        $size = self::initSize($size);

        switch ($name) {
            case 'star':
                $pattern = new StarPattern();
                break;
            case 'tree':
                $pattern = new TreePattern();
                break;
            default:
                return null;
        }

        return new Shape($pattern, $size);
    }

    /**
     * Initialize the size of a shape: formats if exists, picks a random one if doesn't exist
     *
     * @param string|null $size
     * @return int
     * @throws Exception
     */
    public static function initSize($size): int
    {
        $lines = array_search($size, ShapeSettings::AVAILABLE_SIZES, true);

        // if the shape size was not specified or it is not within acceptable sizes, select one randomly
        if (!$lines) {
            $possibleLines = array_keys(ShapeSettings::AVAILABLE_SIZES);

            return $possibleLines[array_rand($possibleLines)];
        }

        return $lines;
    }
}