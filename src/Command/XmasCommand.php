<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Helper\ShapeHelper;

class XmasCommand extends Command
{
    /**
     * Configure the command line command
     */
    public function configure(): void
    {
        $this->setName('xmas')
            ->setDescription('Draw a christmas shape.')
            ->addArgument('shape', InputArgument::REQUIRED, 'The shape to be drawn.')
            ->addOption(
                'size',
                null,
                InputOption::VALUE_OPTIONAL,
                'Set the size of the shape (S, M, L).');
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $shapeName = $input->getArgument('shape');
        $shapeSize = $input->getOption('size');

        $shape = ShapeHelper::initShape($shapeName, $shapeSize);

        if (!$shape) {
            $output->writeln("The shape '$shapeName' doesn't exist");

            return 0;
        }

        $drawing = $shape->draw();

        $output->writeln($drawing);

        return 0;
    }
}