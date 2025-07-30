<?php

declare(strict_types=1);

namespace Sikessem\Filament\Commands\Aliases;

use Sikessem\Filament\Commands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'silament:field')]
class MakeFieldCommand extends Commands\MakeFieldCommand
{
    protected $hidden = true;

    protected $signature = 'silament:field {name} {component} {column} {label?} {--f|force}';
}
