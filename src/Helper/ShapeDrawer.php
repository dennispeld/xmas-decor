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
     * @param string $size
     * @return array
     * @throws Exception
     */
    public static function draw($pattern, $size): array
    {
        $drawing = [];
        $sizes = array_keys(ShapeBuilder::SIZE);

        // if the shape size was not specified or it is not within acceptable sizes, select one randomly
        if (!$size || !in_array($size, $sizes, true)) {
            $size = $sizes[random_int(0, count($sizes) - 1)];
        }

        $patternLines = $pattern->get($size);

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