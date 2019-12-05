<?php

namespace App\Helper;

use App\Shapes\Notes;
use App\Shapes\Pattern;
use App\Shapes\Star;
use App\Shapes\Tree;
use Exception;

class ShapeHelper
{
    public const SIZE = [
        'S' => 5,
        'M' => 7,
        'L' => 11,
    ];

    /**
     * Create a shape by name
     *
     * @param $shapeName
     * @return Pattern|null
     * @throws Exception
     */
    public static function getShape($shapeName): ?Pattern
    {
        switch ($shapeName) {
            case 'star':
                return new Star();
            case 'tree':
                return new Tree();
            case 'notes':
                return new Notes();
            default:
                return null;
        }
    }
}