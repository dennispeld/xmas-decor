<?php

namespace App\Shapes;

class Shape
{
    private Pattern $pattern;
    private string $size;

    public function __construct(Pattern $pattern, string $size)
    {
        $this->pattern = $pattern;
        $this->size = $size;
    }

    /**
     * Get the pattern of the shape
     *
     * @return array
     */
    public function getPattern(): array
    {
        return $this->pattern->get($this->size);
    }
}