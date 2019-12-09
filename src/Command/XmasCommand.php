<?php

namespace App\Command;

use App\Helper\ShapeDrawer;
use App\Helper\ShapeBuilder;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class XmasCommand extends Command
{
    public function configure(): void
    {
        $this->setName('xmas')
            ->setDescription('Draw a christmas shape.')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the shape to be drawn.')
            ->addOption(
                'size',
                null,
                InputOption::VALUE_OPTIONAL,
                'Set the size of the shape.');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $size = $input->getOption('size');

        try {
            $shape = ShapeBuilder::initShape($name, $size);
        } catch (Exception $e) {
            $output->writeln('The shape could not be initialized.');

            return 0;
        }

        if (!$shape) {
            $output->writeln("The shape '$name' doesn't exist");

            return 0;
        }

        try {
            $drawing = ShapeDrawer::draw($shape);
        } catch (Exception $e) {
            $output->writeln('The shape could not be drawn.');

            return 0;
        }

        if (empty($drawing)) {
            $output->writeln("The shape '$name' doesn't have the pattern for the selected size.");

            return 0;
        }

        $output->writeln($drawing);

        return 0;
    }
}