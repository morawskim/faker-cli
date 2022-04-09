#!/usr/bin/env php
<?php

use Symfony\Component\Console\Input\InputDefinition;

if (file_exists($autoload = __DIR__ . '/../vendor/autoload.php')) {
	require($autoload);
} elseif (file_exists($autoload = __DIR__ . '/../../../autoload.php')) {
	require($autoload);
} else {
	die(
		'You must set up the project dependencies, run the following commands:'.PHP_EOL.
		'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
		'php composer.phar install'.PHP_EOL
	);
}

class FakerApplication extends \Symfony\Component\Console\Application
{
	public function __construct()
	{
		parent::__construct('Faker Command Line Tool', '@package_version@');
	}

	protected function getCommandName(\Symfony\Component\Console\Input\InputInterface $input): ?string
	{
        $firstArgument = $input->getFirstArgument();
        if ($firstArgument === 'list-types') {
            return 'list-types';
        }

        return 'faker:generate';
	}

	protected function getDefaultCommands(): array
	{
		$defaultCommands   = parent::getDefaultCommands();
		$defaultCommands[] = new \Bit3\FakerCli\Command\GenerateCommand();
		$defaultCommands[] = new \Bit3\FakerCli\Command\ListTypesCommand();
		return $defaultCommands;
	}

	public function getDefinition(): InputDefinition
	{
		$inputDefinition = parent::getDefinition();
		$inputDefinition->setArguments();
		return $inputDefinition;

	}
}

$application = new FakerApplication();
$application->run();
