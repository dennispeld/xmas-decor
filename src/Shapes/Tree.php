<?php

namespace App\Shapes;


class Tree implements Shape
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
            'Shape: TREE',
            'Size: ' . $this->size
        ];
    }

    public function getPattern(): array
    {

    }
}