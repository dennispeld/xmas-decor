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
            ->addArgument('shape', InputArgument::REQUIRED, 'The shape to be drawn.')
            ->addOption(
                'size',
                null,
                InputOption::VALUE_OPTIONAL,
                'Set the size of the shape (S, M, L).');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $shape = $input->getArgument('shape');
        $size = $input->getOption('size');
        $size = strtoupper($size);

        try {
            $pattern = ShapeBuilder::initShapePattern($shape);
        } catch (Exception $e) {
            $output->writeln('The shape could not be initialized.');

            return 0;
        }

        if (!$pattern) {
            $output->writeln("The shape '$shape' doesn't exist");

            return 0;
        }

        try {
            $drawing = ShapeDrawer::draw($pattern, $size);
        } catch (Exception $e) {
            $output->writeln('The shape could not be drawn.');

            return 0;
        }

        $output->writeln($drawing);

        return 0;
    }
}