<?php

namespace App\Shapes;

class TreePattern implements Pattern
{
    private string $size;

    public function __construct($size)
    {
        $this->size = $size;
    }

    /**
     * Get the pattern of Tree shape
     *
     * @return array
     */
    public function get(): array
    {
        switch ($this->size) {
            case 'S':
                return [
                    1 => [[' ' => 3], ['+' => 1]],
                    2 => [[' ' => 3], ['X' => 1]],
                    3 => [[' ' => 2], ['X' => 3]],
                    4 => [[' ' => 1], ['X' => 5]],
                    5 => [['X' => 7]],
                ];
            case 'M':
                return [
                    1 => [[' ' => 5], ['+' => 1]],
                    2 => [[' ' => 5], ['X' => 1]],
                    3 => [[' ' => 4], ['X' => 3]],
                    4 => [[' ' => 3], ['X' => 5]],
                    5 => [[' ' => 2], ['X' => 7]],
                    6 => [[' ' => 1], ['X' => 9]],
                    7 => [['X' => 11]],
                ];
            case 'L':
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