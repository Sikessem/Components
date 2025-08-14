<?php

declare(strict_types=1);

namespace Sikessem\Components\Commands\Aliases;

use Sikessem\Components\Commands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'sikessem:base-field')]
class MakeBaseFieldCommand extends Commands\MakeBaseFieldCommand
{
    protected $hidden = true;

    protected $signature = 'sikessem:base-field {name=Field : The name of the abstract field} {--f|force}';
}
