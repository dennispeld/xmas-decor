<?php

namespace App\Command;

use App\Helper\DrawHelper;
use App\Helper\ShapeHelper;
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
        $shapeSize = strtoupper($shapeSize);

        try {
            $shape = ShapeHelper::getShape($shapeName);
        } catch (Exception $e) {
            $output->writeln('The shape could not be initialized.' . $e->getMessage() . $e->getTrace());

            return 0;
        }

        if (!$shape) {
            $output->writeln("The shape '$shapeName' doesn't exist");

            return 0;
        }

        $drawing = DrawHelper::draw($shape, $shapeSize);

        $output->writeln($drawing);

        return 0;
    }
}