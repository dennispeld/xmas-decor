<?php

namespace App\Shapes;

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
        $linesInPattern = count($pattern);

        // get through each line in the pattern array
        for ($line = 1; $line <= $linesInPattern; $line ++) {
            // if size of the shape is not specified in the patter line, move to the next line
            if (strpos($pattern[$line]['sizes'], $this->sizeLabel) === false) {
                continue;
            }

            // extra '+' on the top and bottom of the shape, otherwise its 'X' to fill the shape
            $fill = ($line === 1) ? '+' : 'X';

            $drawLine = str_repeat(' ', $pattern[$line]['spaces'])
                . str_repeat($fill, $pattern[$line]['fillings'])
                . str_repeat(' ', $pattern[$line]['spaces']);

            $drawing[] = $drawLine;
        }

        return $drawing;
    }

    public function getPattern(): array
    {
        // each line of patter consists of number of spaces, number of fillings and the applicable sizes
        return [
            1 => ['spaces' => 9, 'fillings' => 1, 'sizes' => 'SML'],
            2 => ['spaces' => 9, 'fillings' => 1, 'sizes' => 'SML'],
            3 => ['spaces' => 8, 'fillings' => 3, 'sizes' => 'SML'],
            4 => ['spaces' => 7, 'fillings' => 5, 'sizes' => 'SML'],
            5 => ['spaces' => 6, 'fillings' => 7, 'sizes' => 'SML'],
            6 => ['spaces' => 5, 'fillings' => 9, 'sizes' => 'ML'],
            7 => ['spaces' => 4, 'fillings' => 11, 'sizes' => 'ML'],
            8 => ['spaces' => 3, 'fillings' => 13, 'sizes' => 'L'],
            9 => ['spaces' => 2, 'fillings' => 15, 'sizes' => 'L'],
            10 => ['spaces' => 1, 'fillings' => 17, 'sizes' => 'L'],
            11 => ['spaces' => 0, 'fillings' => 19, 'sizes' => 'L'],
        ];
    }
}