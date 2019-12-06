<?php

namespace App\Helper;

use App\Shapes\Shape;
use Exception;

class ShapeDrawer
{
    /**
     * Draw a shape by its size
     *
     * @param Shape $shape
     * @return array
     * @throws Exception
     */
    public static function draw($shape): array
    {
        $drawing = [];

        $pattern = $shape->getPattern();

        // get through each line in the pattern array
        for ($line = 1, $lineMax = count($pattern); $line <= $lineMax; $line ++) {
            $drawing[] = self::drawLine($pattern[$line]);
        }

        return $drawing;
    }

    /**
     * Draw a line by the rules from the pattern
     *
     * @param array $rules
     * @return string
     */
    private static function drawLine($rules): string
    {
        $line = '';

        foreach ($rules as $rule) {
            $line .= str_repeat(key($rule), $rule[key($rule)]);
        }

        return $line;
    }
}