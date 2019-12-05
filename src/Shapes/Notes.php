<?php

namespace App\Shapes;

class Notes implements Pattern
{
    /**
     * Get the pattern of Notes shape
     *
     * @param string $size
     * @return array
     */
    public function get($size): array
    {
        switch ($size) {
            case 'S':
            case 'M':
            case 'L':
                return [
                    1 => [[' ' => 6], ['X' => 4]],
                    2 => [[' ' => 3], ['X' => 3], [' ' => 3], ['X' => 1]],
                    3 => [[' ' => 3], ['X' => 1], [' ' => 3], ['X' => 3]],
                    4 => [[' ' => 3], ['X' => 4], [' ' => 2], ['X' => 1]],
                    5 => [[' ' => 3], ['X' => 1], [' ' => 5], ['X' => 1]],
                    6 => [[' ' => 3], ['X' => 1], [' ' => 3], ['X' => 3]],
                    7 => [[' ' => 1], ['X' => 3], [' ' => 2], ['X' => 4]],
                    8 => [['X' => 4], [' ' => 2], ['X' => 4]],
                    9 => [['X' => 4], [' ' => 3], ['X' => 2], [' ' => 1]],
                    10 => [[' ' => 1], ['X' => 2], [' ' => 7]],
                ];
        }
    }
}