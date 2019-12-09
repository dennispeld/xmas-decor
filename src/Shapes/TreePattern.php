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
        switch ($size) {
            case 5:
                return [
                    1 => [[' ' => 3], ['+' => 1]],
                    2 => [[' ' => 3], ['X' => 1]],
                    3 => [[' ' => 2], ['X' => 3]],
                    4 => [[' ' => 1], ['X' => 5]],
                    5 => [['X' => 7]],
                ];
            case 7:
                return [
                    1 => [[' ' => 5], ['+' => 1]],
                    2 => [[' ' => 5], ['X' => 1]],
                    3 => [[' ' => 4], ['X' => 3]],
                    4 => [[' ' => 3], ['X' => 5]],
                    5 => [[' ' => 2], ['X' => 7]],
                    6 => [[' ' => 1], ['X' => 9]],
                    7 => [['X' => 11]],
                ];
            case 11:
                return [
                    1 => [[' ' => 9], ['+' => 1]],
                    2 => [[' ' => 9], ['X' => 1]],
                    3 => [[' ' => 8], ['X' => 3]],
                    4 => [[' ' => 7], ['X' => 5]],
                    5 => [[' ' => 6], ['X' => 7]],
                    6 => [[' ' => 5], ['X' => 9]],
                    7 => [[' ' => 4], ['X' => 11]],
                    8 => [[' ' => 3], ['X' => 13]],
                    9 => [[' ' => 2], ['X' => 15]],
                    10 => [[' ' => 1], ['X' => 17]],
                    11 => [['X' => 19]],
                ];
            default:
                return [];
        }
    }
}