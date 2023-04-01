<?php


use Sfolador\HeidiPaySaloon\Dto\AuthDto;

it('has a merchant key',function(){
    $authDto = new AuthDto('merchant-key');

    expect($authDto->merchantKey)->toBe('merchant-key');
});


it('can be created from a merchant key',function(){
    $authDto= AuthDto::from('merchant-key');

    expect($authDto->merchantKey)->toBe('merchant-key');
});