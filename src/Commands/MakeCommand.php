<?php

declare(strict_types=1);

namespace Sikessem\Filament\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;

abstract class MakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    /**
     * Resolve the fully-qualified path to the stub.
     */
    protected function resolveStubPath(string $stub): string
    {
        $stub = trim($stub, '/');

        return file_exists($customPath = $this->laravel->basePath($stub))
            ? $customPath
            : dirname(__DIR__, 2).DIRECTORY_SEPARATOR.$stub;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    #[\Override]
    protected function getNameInput()
    {
        $name = str(parent::getNameInput())->studly();
        $type = str($this->type)->studly()->toString();

        if (! $name->endsWith($type)) {
            $name = $name->append($type);
        }

        return $name->toString();
    }
}
