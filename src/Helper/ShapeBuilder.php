<?php

namespace App\Helper;

use App\Shapes\NotesPattern;
use App\Shapes\Pattern;
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
     * Initialize a shape pattern
     *
     * @param string $name
     * @param string|null $size
     * @return Pattern|null
     * @throws Exception
     */
    public static function initShapePattern($name, $size): ?Pattern
    {
        $size = self::initShapeSize($size);

        switch ($name) {
            case 'star':
                return new StarPattern($size);
            case 'tree':
                return new TreePattern($size);
            case 'notes':
                return new NotesPattern($size);
            default:
                return null;
        }
    }

    /**
     * Initialize the size of a shape
     *
     * @param $size
     * @return string|null
     * @throws Exception
     */
    private static function initShapeSize($size): ?string
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