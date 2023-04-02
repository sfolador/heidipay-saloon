<?php

use Sfolador\HeidiPaySaloon\Connector\HeidiPayConnector;

it('has an api url', function () {
    $connector = new HeidiPayConnector(apiUrl: 'https://example.com');
    expect($connector->resolveBaseUrl())->toBe('https://example.com');
});

it('has default headers', function () {
    $connector = new HeidiPayConnector(apiUrl: 'https://example.com');

    expect($connector->headers()->all())->toEqual([
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]);
});
