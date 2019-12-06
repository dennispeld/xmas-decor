<?php
/**
 * The file XmasCommandTest.php is subject to the terms and conditions defined
 * in 'LICENSE.txt', which is part of the source code package.
 *
 * Copyright (c) 2019. Buncha Services UG
 */

namespace App\Tests\Command;

use App\Command\XmasCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class XmasCommandTest extends KernelTestCase
{

    public function testExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);
        $command = $application->find('xmas');
        $commandTester = new CommandTester($command);

        // output a star, size L
        $commandTester->execute(['name' => 'star', '--size' => 'L',]);
        $output = $commandTester->getDisplay();
        $this->assertContains('+XXXXXXXXXXXXXXX+', $output);

        // output a tree, size L
        $commandTester->execute(['name' => 'tree', '--size' => 'L',]);
        $output = $commandTester->getDisplay();
        $this->assertContains('XXXXXXXXXXXXXXXXXXX', $output);

        // output a bell (which doesnt exist)
        $commandTester->execute(['name' => 'bell',]);
        $output = $commandTester->getDisplay();
        $this->assertContains('The shape \'bell\' doesn\'t exist', $output);
    }
}
