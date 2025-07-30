<?php

declare(strict_types=1);

namespace Sikessem\Filament\Commands\Aliases;

use Sikessem\Filament\Commands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'silament:base-field')]
class MakeBaseFieldCommand extends Commands\MakeBaseFieldCommand
{
    protected $hidden = true;

    protected $signature = 'silament:base-field {name=Field : The name of the abstract field} {--f|force}';
}
