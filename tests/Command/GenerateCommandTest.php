<?php

namespace Command;

use Bit3\FakerCli\Command\GenerateCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class GenerateCommandTest extends TestCase
{
    public function testDefaultPrintfOutput(): void
    {
        $commandTester = new CommandTester(new GenerateCommand());
        $commandTester->execute(['type' => 'firstName']);

        $this->assertSame(0, $commandTester->getStatusCode());
        $output = trim($commandTester->getDisplay());
        $lines = explode("\n", $output);
        $this->assertCount(10, $lines);

        foreach ($lines as $line) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z]+$/', $line);
        }
    }
}
