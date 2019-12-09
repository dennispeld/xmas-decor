<?php

namespace App\Tests\Helper;

use App\Helper\ShapeDrawer;
use App\Shapes\Shape;
use App\Shapes\StarPattern;
use App\Shapes\TreePattern;
use Exception;
use PHPUnit\Framework\TestCase;

class ShapeDrawerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testDraw(): void
    {
        $pattern = new TreePattern();
        $shape = new Shape($pattern, 5);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(5, $drawingLinesNumber);

        $pattern = new TreePattern();
        $shape = new Shape($pattern, 7);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(7, $drawingLinesNumber);

        $pattern = new StarPattern();
        $shape = new Shape($pattern,11);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(11, $drawingLinesNumber);
    }
}
