<?php

declare(strict_types=1);

namespace Sikessem\Components\Commands\Aliases;

use Sikessem\Components\Commands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'sikessem:field')]
class MakeFieldCommand extends Commands\MakeFieldCommand
{
    protected $hidden = true;

    protected $signature = 'sikessem:field {name} {component} {column} {label?} {--f|force}';
}
