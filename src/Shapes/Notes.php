<?php

namespace App\Shapes;

use App\Helper\DrawHelper;

class Notes implements Shape
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

    public function getPattern(): array
    {
        switch ($this->sizeLabel) {
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