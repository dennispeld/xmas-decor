<?php

namespace App\Shapes;


class Star implements Shape
{
    private string $size;

    public function setSize($size): void
    {
        $this->size = $size;
    }

    public function draw(): array
    {
        return [
            '==========================================',
            'Shape: STAR',
            'Size: ' . $this->size
        ];
    }

    public function getPattern(): array
    {

    }
}