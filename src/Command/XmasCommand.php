<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Helper\ShapeHelper;

class XmasCommand extends Command
{
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

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $shapeName = $input->getArgument('shape');
        $shapeSize = $input->getOption('size');

        try {
            $shape = ShapeHelper::getShape($shapeName, $shapeSize);
        } catch (Exception $e) {
            $output->writeln('The shape could not be initialized.');

            return 0;
        }

        if (!$shape) {
            $output->writeln("The shape '$shapeName' doesn't exist");

            return 0;
        }

        $drawing = $shape->draw();

        $output->writeln($drawing);

        return 0;
    }
}