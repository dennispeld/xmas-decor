<?php

namespace App\Shapes;

use App\Helper\DrawHelper;

class Tree implements Shape
{
    private string $sizeLabel;

    public function setSize($sizeLabel): void
    {
        $this->sizeLabel = $sizeLabel;
    }

    public function draw(): array
    {
        $drawing = [];

        $pattern = $this->getPattern();

        // get through each line in the pattern array
        for ($line = 1, $lineMax = count($pattern); $line <= $lineMax; $line ++) {
            $drawing[] = DrawHelper::drawLine($pattern[$line]);
        }

        return $drawing;
    }

    /**
     * In the pattern for each line we specify how many spaces and/or characters needs to be printed
     *
     * @return array
     */
    public function getPattern(): array
    {
        switch ($this->sizeLabel) {
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