<?php

namespace App\Shapes;

class NotesPattern implements Pattern
{
    private string $size;

    public function __construct($size)
    {
        $this->size = $size;
    }

    /**
     * Get the pattern of Notes shape
     *
     * @return array
     */
    public function get(): array
    {
        switch ($this->size) {
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
            default:
                return [];
        }
    }
}