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
     * @param $name
     * @return Pattern|null
     * @throws Exception
     */
    public static function initShapePattern($name): ?Pattern
    {
        switch ($name) {
            case 'star':
                return new StarPattern();
            case 'tree':
                return new TreePattern();
            case 'notes':
                return new NotesPattern();
            default:
                return null;
        }
    }
}