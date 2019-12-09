<?php

namespace App\Shapes;

class TreePattern implements Pattern
{
    /**
     * Get the pattern of Tree shape
     *
     * @param int $size
     * @return array
     */
    public function get($size): array
    {
        $s = ShapeSettings::AVAILABLE_CHARACTERS['SPACE'];
        $f = ShapeSettings::AVAILABLE_CHARACTERS['FILL'];
        $e = ShapeSettings::AVAILABLE_CHARACTERS['EDGE'];
        
        switch ($size) {
            case 5:
                return [
                    1 => [[$s => 3], [$e => 1]],
                    2 => [[$s => 3], [$f => 1]],
                    3 => [[$s => 2], [$f => 3]],
                    4 => [[$s => 1], [$f => 5]],
                    5 => [[$f => 7]],
                ];
            case 7:
                return [
                    1 => [[$s => 5], [$e => 1]],
                    2 => [[$s => 5], [$f => 1]],
                    3 => [[$s => 4], [$f => 3]],
                    4 => [[$s => 3], [$f => 5]],
                    5 => [[$s => 2], [$f => 7]],
                    6 => [[$s => 1], [$f => 9]],
                    7 => [[$f => 11]],
                ];
            case 11:
                return [
                    1 => [[$s => 9], [$e => 1]],
                    2 => [[$s => 9], [$f => 1]],
                    3 => [[$s => 8], [$f => 3]],
                    4 => [[$s => 7], [$f => 5]],
                    5 => [[$s => 6], [$f => 7]],
                    6 => [[$s => 5], [$f => 9]],
                    7 => [[$s => 4], [$f => 11]],
                    8 => [[$s => 3], [$f => 13]],
                    9 => [[$s => 2], [$f => 15]],
                    10 => [[$s => 1], [$f => 17]],
                    11 => [[$f => 19]],
                ];
            default:
                return [];
        }
    }
}