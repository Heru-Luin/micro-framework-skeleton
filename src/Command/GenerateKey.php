<?php

namespace Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateKey extends Command
{
    protected function configure()
    {
        $this
            ->setName('generate:key')
            ->setDescription('Generate secret key')
            ->setHelp('This command allows you to create new key');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ...
    }
}
