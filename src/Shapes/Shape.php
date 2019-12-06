<?php

namespace App\Shapes;

class Shape
{
    private Pattern $pattern;

    public function __construct(Pattern $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Get the pattern of the shape
     *
     * @return array
     */
    public function getPattern(): array
    {
        return $this->pattern->get();
    }
}