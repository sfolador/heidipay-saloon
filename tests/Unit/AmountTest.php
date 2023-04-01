<?php

use Sfolador\HeidiPaySaloon\Enum\AmountFormat;
use Sfolador\HeidiPaySaloon\Models\Amount;

it('has an amount',function(){
    $amount = Amount::from('EUR','100', AmountFormat::MINOR_UNIT);
    expect($amount->amount)->toBe('100');
});


it('has a currency',function(){
    $amount = Amount::from('EUR','100', AmountFormat::MINOR_UNIT);
    expect($amount->currency)->toBe('EUR');
});

it('has a format',function(){
    $amount = Amount::from('EUR','100', AmountFormat::MINOR_UNIT);
    expect($amount->amountFormat)->toBe(AmountFormat::MINOR_UNIT);
});