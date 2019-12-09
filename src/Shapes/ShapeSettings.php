<?php

namespace App\Shapes;

abstract class ShapeSettings
{
    public const AVAILABLE_SIZES = [
        5 => 'S',
        7 => 'M',
        11 => 'L',
    ];

    public const AVAILABLE_CHARACTERS = [
        'SPACE' => ' ',
        'FILL' => 'X',
        'EDGE' => '+',
    ];
}