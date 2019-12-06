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
        $pattern = new TreePattern('S');
        $shape = new Shape($pattern);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(5, $drawingLinesNumber);

        $pattern = new TreePattern('M');
        $shape = new Shape($pattern);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(7, $drawingLinesNumber);

        $pattern = new StarPattern('L');
        $shape = new Shape($pattern);
        $drawing = ShapeDrawer::draw($shape);
        $drawingLinesNumber = count($drawing);
        $this->assertEquals(11, $drawingLinesNumber);
    }
}
