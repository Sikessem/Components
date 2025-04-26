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
     *
     * @param  string  $stub
     */
    protected function resolveStubPath($stub): string
    {
        $stub = trim($stub, '/');

        return file_exists($customPath = $this->laravel->basePath($stub))
            ? $customPath
            : base_path($stub);
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

        if (! $name->endsWith($this->type)) {
            $name = $name->append(ucfirst($this->type));
        }

        return $name->toString();
    }
}
