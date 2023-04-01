<?php

use Sfolador\HeidiPaySaloon\Dto\AuthDto;
use Sfolador\HeidiPaySaloon\Requests\AuthRequest;

it('has a  body', function () {
    $merchantKey = 'merchant-key';
    $authDto = new AuthDto('merchant-key');
    $authRequest = new AuthRequest($authDto);

    $body = $authRequest->body()->all();

    expect($body['merchant_key'])->toBe($merchantKey);
});

it('has a an endpoint', function () {
    $authDto = new AuthDto('merchant-key');
    $authRequest = new AuthRequest($authDto);

    expect($authRequest->resolveEndpoint())->toBe('/auth/v1/generate/');
});
