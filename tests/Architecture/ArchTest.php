<?php

it('globals')
    ->expect(['dd', 'dump'])
    ->not->toBeUsed();