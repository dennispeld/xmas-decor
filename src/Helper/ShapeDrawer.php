<?php

namespace App\Helper;

use App\Shapes\Pattern;
use Exception;

class ShapeDrawer
{
    /**
     * Draw a shape according to its size
     *
     * @param Pattern $pattern
     * @return array
     * @throws Exception
     */
    public static function draw($pattern): array
    {
        $drawing = [];

        $patternLines = $pattern->get();

        // get through each line in the pattern array
        for ($line = 1, $lineMax = count($patternLines); $line <= $lineMax; $line ++) {
            $drawing[] = self::drawLine($patternLines[$line]);
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