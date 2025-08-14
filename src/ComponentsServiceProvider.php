<?php

declare(strict_types=1);

namespace Sikessem\Components;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sikessem-components')
            ->hasCommands($this->getCommands())
            ->hasConfigFile();
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        $commands = [
            Commands\MakeBaseFieldCommand::class,
            Commands\MakeFieldCommand::class,
        ];

        $aliases = [];

        foreach ($commands as $command) {
            $class = __NAMESPACE__.'\\Commands\\Aliases\\'.class_basename($command);

            if (! class_exists($class)) {
                continue;
            }

            $aliases[] = $class;
        }

        return [
            ...$commands,
            ...$aliases,
        ];
    }
}
