<?php

namespace App\Tests\Shapes;

use App\Shapes\Shape;
use App\Shapes\TreePattern;
use PHPUnit\Framework\TestCase;

class ShapeTest extends TestCase
{

    public function testGetPattern()
    {
        $shape = new Shape(new TreePattern(), 11);
        $pattern = $shape->getPattern();
        $this->assertCount(11, $pattern);
    }
}
