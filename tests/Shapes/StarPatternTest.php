<?php

namespace App\Tests\Shapes;

use App\Shapes\StarPattern;
use PHPUnit\Framework\TestCase;

class StarPatternTest extends TestCase
{

    public function testGet()
    {
        $star = new StarPattern();
        $pattern = $star->get(5);
        $this->assertCount(5, $pattern);

        $star = new StarPattern();
        $pattern = $star->get(15);
        $this->assertCount(0, $pattern);
    }
}
