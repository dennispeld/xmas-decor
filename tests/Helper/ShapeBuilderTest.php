<?php

namespace App\Tests\Helper;

use App\Helper\ShapeBuilder;
use App\Shapes\Shape;
use Exception;
use PHPUnit\Framework\TestCase;

class ShapeBuilderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testInitShape(): void
    {
        // init a star shape
        $starShape = ShapeBuilder::initShape('star', 'L');
        $this->assertInstanceOf(Shape::class, $starShape);

        // init a tree shape
        $treeShape = ShapeBuilder::initShape('tree', null);
        $this->assertInstanceOf(Shape::class, $treeShape);
    }

    /**
     * @throws Exception
     */
    public function testInitSize(): void
    {
        // size exists
        $shapeSizeS = ShapeBuilder::initSize('S');
        $this->assertEquals('S', $shapeSizeS);

        // size doesnt exist, but initSize should pick a random one
        $shapeSizeXxl = ShapeBuilder::initSize('XXL');
        $this->assertContains($shapeSizeXxl, ['S', 'M', 'L']);

        // size was not specified, but initSize should pick a random one
        $shapeSizeNull = ShapeBuilder::initSize(null);
        $this->assertContains($shapeSizeNull, ['S', 'M', 'L']);
    }
}
