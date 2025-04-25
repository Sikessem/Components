<?php

namespace Sikessem\Filament;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SilamentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('silament')
            ->hasConfigFile();
    }

    public function getCommands(): array
    {
        return [
            Commands\MakeFieldCommand::class,
        ];
    }
}
