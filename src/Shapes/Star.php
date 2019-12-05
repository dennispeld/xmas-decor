<?php

namespace App\Shapes;

use App\Helper\DrawHelper;

class Star implements Shape
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
     * Set up and retrieve a pattern for each size
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
                    3 => [['+' => 1], ['X' => 5], ['+' => 1]],
                    4 => [[' ' => 3], ['X' => 1]],
                    5 => [[' ' => 3], ['+' => 1]],
                ];
            case 'M':
                return [
                    1 => [[' ' => 5], ['+' => 1]],
                    2 => [[' ' => 5], ['X' => 1]],
                    3 => [[' ' => 3], ['X' => 5]],
                    4 => [['+' => 1], ['X' => 9], ['+' => 1]],
                    5 => [[' ' => 3], ['X' => 5]],
                    6 => [[' ' => 5], ['X' => 1]],
                    7 => [[' ' => 5], ['+' => 1]],
                ];
            case 'L':
                return [
                    1 => [[' ' => 8], ['+' => 1]],
                    2 => [[' ' => 8], ['X' => 1]],
                    3 => [[' ' => 7], ['X' => 3]],
                    4 => [[' ' => 5], ['X' => 7]],
                    5 => [[' ' => 3], ['X' => 11]],
                    6 => [['+' => 1], ['X' => 15], ['+' => 1]],
                    7 => [[' ' => 3], ['X' => 11]],
                    8 => [[' ' => 5], ['X' => 7]],
                    9 => [[' ' => 7], ['X' => 3]],
                    10 => [[' ' => 8], ['X' => 1]],
                    11 => [[' ' => 8], ['+' => 1]],
                ];
            default:
                return [];
        }
    }
}