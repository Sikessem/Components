<?php

declare(strict_types=1);

namespace Sikessem\Filament;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SilamentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('silament')
            ->hasCommands($this->getCommands())
            ->hasConfigFile();
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        $commands = [
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
