<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RandomInteger extends Command
{
    protected function configure()
    {
        $this
            ->setName('random:integer')
            ->setDescription('Get random integer (10, 99)')
            ->setHelp('This command allows you get random integer');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Random Integer',
            '|'.rand(10, 99).'|'
        ]);
        
        $output->writeln('End!');
    }
}
