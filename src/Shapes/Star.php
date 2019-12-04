<?php

namespace App\Shapes;

use App\Helper\ShapeHelper;

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
        $linesInPattern = count($pattern);
        $middleLine = ceil(ShapeHelper::SIZE[$this->sizeLabel] / 2);

        // get through each line in the pattern array
        for ($line = 1; $line <= $linesInPattern; $line ++) {
            // if size of the shape is not specified in the patter line, move to the next line
            if (strpos($pattern[$line]['sizes'], $this->sizeLabel) === false) {
                continue;
            }

            // extra '+' on the sides of each shape's middle line
            $extraHorizon = ($line === (int) $middleLine) ? '+' : ' ';

            // extra '+' on the top and bottom of the shape, otherwise its 'X' to fill the shape
            $fill = ($line === 1 || $line === 11) ? '+' : 'X';

            $drawLine = str_repeat(' ', $pattern[$line]['spaces'])
                . $extraHorizon . str_repeat($fill, $pattern[$line]['fillings']) . $extraHorizon
                . str_repeat(' ', $pattern[$line]['spaces']);

            $drawing[] = $drawLine;
        }

        return $drawing;
    }

    public function getPattern(): array
    {
        // each line of patter consists of number of spaces, number of fillings and the applicable sizes
        return [
            1 => ['spaces' => 8, 'fillings' => 1, 'sizes' => 'SML'],
            2 => ['spaces' => 8, 'fillings' => 1, 'sizes' => 'SML'],
            3 => ['spaces' => 6, 'fillings' => 5, 'sizes' => 'SML'],
            4 => ['spaces' => 4, 'fillings' => 9, 'sizes' => 'ML'],
            5 => ['spaces' => 2, 'fillings' => 13, 'sizes' => 'L'],
            6 => ['spaces' => 0, 'fillings' => 17, 'sizes' => 'L'],
            7 => ['spaces' => 2, 'fillings' => 13, 'sizes' => 'L'],
            8 => ['spaces' => 4, 'fillings' => 9, 'sizes' => 'L'],
            9 => ['spaces' => 6, 'fillings' => 5, 'sizes' => 'ML'],
            10 => ['spaces' => 8, 'fillings' => 1, 'sizes' => 'SML'],
            11 => ['spaces' => 8, 'fillings' => 1, 'sizes' => 'SML'],
        ];
    }
}