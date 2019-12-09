<?php
/**
 * The file TreePatternTest.php is subject to the terms and conditions defined
 * in 'LICENSE.txt', which is part of the source code package.
 *
 * Copyright (c) 2019. Buncha Services UG
 */

namespace App\Tests\Shapes;

use App\Shapes\TreePattern;
use PHPUnit\Framework\TestCase;

class TreePatternTest extends TestCase
{

    public function testGet()
    {
        $tree = new TreePattern();
        $pattern = $tree->get(11);
        $this->assertCount(11, $pattern);

        $tree = new TreePattern();
        $pattern = $tree->get(15);
        $this->assertCount(0, $pattern);
    }
}
