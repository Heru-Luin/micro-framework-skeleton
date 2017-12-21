<?php

namespace Test\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class RandomIntegerTest extends TestCase
{
    public function test_two_digit_integer()
    {
        $commandTester = new CommandTester(new \Command\RandomInteger());
        $commandTester->execute([]);
        
        $this->assertRegExp('/[\d+]{2}/', $commandTester->getDisplay());
    }
}

