<?php

namespace App\Shapes;

class StarPattern implements Pattern
{
    /**
     * Get the pattern of Star shape
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
                    3 => [[$e => 1], [$f => 5], [$e => 1]],
                    4 => [[$s => 3], [$f => 1]],
                    5 => [[$s => 3], [$e => 1]],
                ];
            case 7:
                return [
                    1 => [[$s => 5], [$e => 1]],
                    2 => [[$s => 5], [$f => 1]],
                    3 => [[$s => 3], [$f => 5]],
                    4 => [[$e => 1], [$f => 9], [$e => 1]],
                    5 => [[$s => 3], [$f => 5]],
                    6 => [[$s => 5], [$f => 1]],
                    7 => [[$s => 5], [$e => 1]],
                ];
            case 11:
                return [
                    1 => [[$s => 8], [$e => 1]],
                    2 => [[$s => 8], [$f => 1]],
                    3 => [[$s => 7], [$f => 3]],
                    4 => [[$s => 5], [$f => 7]],
                    5 => [[$s => 3], [$f => 11]],
                    6 => [[$e => 1], [$f => 15], [$e => 1]],
                    7 => [[$s => 3], [$f => 11]],
                    8 => [[$s => 5], [$f => 7]],
                    9 => [[$s => 7], [$f => 3]],
                    10 => [[$s => 8], [$f => 1]],
                    11 => [[$s => 8], [$e => 1]],
                ];
            default:
                return [];
        }
    }
}