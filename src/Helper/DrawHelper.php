<?php

namespace App\Helper;

class DrawHelper
{
    /**
     * Draw a line by the rules from the pattern
     *
     * @param array $rules
     * @return string
     */
    public static function drawLine($rules): string
    {
        $line = '';

        foreach ($rules as $rule) {
            $line .= str_repeat(key($rule), $rule[key($rule)]);
        }

        return $line;
    }
}