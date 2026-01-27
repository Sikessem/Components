<?php

declare(strict_types=1);

namespace Sikessem\Components\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(name: 'make:sikessem-input')]
class MakeInputCommand extends MakeCommand
{
    protected $signature = 'make:sikessem-input {name} {component} {column} {label?} {--f|force}';

    protected $description = 'Create a new input';

    protected $type = 'input';

    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/input.stub');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    #[\Override]
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the '.strtolower($this->type)],
            ['component', InputArgument::REQUIRED, 'The form component of the '.strtolower($this->type)],
            ['column', InputArgument::REQUIRED, 'The table column of the '.strtolower($this->type)],
            ['label', InputArgument::OPTIONAL, 'The label of the '.strtolower($this->type)],
        ];
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    #[\Override]
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        $this
            ->replaceArgument($stub, 'component')
            ->replaceArgument($stub, 'column')
            ->replaceArgument($stub, 'name')
            ->replaceArgument($stub, 'label');

        return $stub;
    }

    protected function replaceArgument(string &$stub, string $name, string $default = 'null'): static
    {
        $subject = $name === 'name'
        ? str($this->getNameInput())->beforeLast(ucfirst($this->type))->snake()
        : str($this->argument($name))->trim();

        if ($subject->isEmpty()) {
            $subject = $default;
        } elseif (in_array($name, ['name', 'label'])) {
            $subject = $subject->replace(['\\', '\''], ['\\\\', '\\\''])->wrap('\'');
        }

        $stub = str_replace(['Dummy'.ucfirst($name), '{{ '.$name.' }}', '{{'.$name.'}}'], (string) $subject, $stub);

        return $this;
    }

    /**
     * @param  string  $rootNamespace
     */
    #[\Override]
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\\Inputs';
    }
}
