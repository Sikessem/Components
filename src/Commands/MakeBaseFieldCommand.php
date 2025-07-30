<?php

declare(strict_types=1);

namespace Sikessem\Filament\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make:silament-base-field')]
class MakeBaseFieldCommand extends MakeCommand
{
    protected $signature = 'make:silament-base-field {name=Field : The name of the abstract field} {--f|force}';

    protected $description = 'Create the base field';

    protected $type = 'base-field';

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    #[\Override]
    protected function getArguments()
    {
        return [
            ['name', InputArgument::OPTIONAL, 'The name of the '.str($this->type)->lower()],
        ];
    }

    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/base-field.stub');
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    #[\Override]
    protected function getNameInput()
    {
        $name = str(parent::getNameInput());
        $type = str($this->type)->studly()->toString();
        $name = $name->beforeLast($type)->studly()->toString();

        return $name;
    }

    #[\Override]
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\Fields';
    }
}
