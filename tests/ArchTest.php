<?php

declare(strict_types=1);

arch('globals')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();

arch('classes')
    ->expect('Sikessem\Components')
    ->toUseStrictTypes();

arch('contracts')
    ->expect('Sikessem\Components\Contracts')
    ->interfaces()
    ->toOnlyBeUsedIn('Sikessem\Components', 'Sikessem\Components\Contracts');

arch('concerns')
    ->expect('Sikessem\Components\Concerns')
    ->traits()
    ->toOnlyBeUsedIn('Sikessem\Components', 'Sikessem\Components\Concerns');
