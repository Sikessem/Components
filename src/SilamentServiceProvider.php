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
        return [
            Commands\MakeFieldCommand::class,
        ];
    }
}
