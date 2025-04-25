<?php

declare(strict_types=1);

arch('globals')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();

arch('classes')
    ->expect('Sikessem\Filament')
    ->toUseStrictTypes();

arch('contracts')
    ->expect('Sikessem\Filament\Contracts')
    ->interfaces()
    ->toOnlyBeUsedIn('Sikessem\Filament', 'Sikessem\Filament\Contracts');

arch('concerns')
    ->expect('Sikessem\Filament\Concerns')
    ->traits()
    ->toOnlyBeUsedIn('Sikessem\Filament', 'Sikessem\Filament\Concerns');
