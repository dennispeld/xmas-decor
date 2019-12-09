<?php

namespace App\Command;

use App\Helper\ShapeDrawer;
use App\Helper\ShapeBuilder;
use App\Shapes\ShapeSettings;
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

        if ($size && !in_array($size, ShapeSettings::AVAILABLE_SIZES, false)) {
            $availableSizes = implode(', ', ShapeSettings::AVAILABLE_SIZES);
            $output->writeln("The size '$size' is not allowed. Available sizes: $availableSizes.");

            return 0;
        }

        try {
            $shape = ShapeBuilder::initShape($name, $size);

            if (!$shape) {
                $output->writeln("The shape '$name' doesn't exist");
            }

            $drawing = ShapeDrawer::draw($shape);

            if (empty($drawing)) {
                $output->writeln("The shape '$name' doesn't have the pattern for this size.");
            } else {
                $output->writeln($drawing);
            }

        } catch (Exception $e) {
            $output->writeln('The shape could not be drawn.');
        } finally {
            return 0;
        }
    }
}