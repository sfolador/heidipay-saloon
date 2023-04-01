<?php

/**
 *         public readonly string $success,
public readonly string $failure,
public readonly string $cancel,
public readonly string $status,
public readonly string $mappingScheme,
 */

use Sfolador\HeidiPaySaloon\Models\Webhooks;

it('has a success url', function () {
    $success = 'https://www.example.com';
    $webhooks = new Webhooks(
        success: $success,
        failure: 'https://www.google.com',
        cancel: 'https://www.google.com',
        status: 'https://www.google.com',
        mappingScheme: 'https://www.google.com',
    );
    expect($webhooks->success)->toBe($success);
});

it('has a failure url', function () {
    $failure = 'https://www.example.com';
    $webhooks = new Webhooks(
        success: 'https://www.google.com',
        failure: $failure,
        cancel: 'https://www.google.com',
        status: 'https://www.google.com',
        mappingScheme: 'https://www.google.com',
    );
    expect($webhooks->failure)->toBe($failure);
});

it('has a cancel url', function () {
    $cancel = 'https://www.example.com';
    $webhooks = new Webhooks(
        success: 'https://www.google.com',
        failure: 'https://www.google.com',
        cancel: $cancel,
        status: 'https://www.google.com',
        mappingScheme: 'https://www.google.com',
    );
    expect($webhooks->cancel)->toBe($cancel);
});

it('has a status url', function () {
    $status = 'https://www.example.com';
    $webhooks = new Webhooks(
        success: 'https://www.google.com',
        failure: 'https://www.google.com',
        cancel: 'https://www.google.com',
        status: $status,
        mappingScheme: 'https://www.google.com',
    );
    expect($webhooks->status)->toBe($status);
});

it('has a mappingScheme', function () {
    $mappingScheme = 'default';
    $webhooks = new Webhooks(
        success: 'https://www.google.com',
        failure: 'https://www.google.com',
        cancel: 'https://www.google.com',
        status: 'https://www.google.com',
        mappingScheme: $mappingScheme
    );
    expect($webhooks->mappingScheme)->toBe($mappingScheme);
});

it('has a token', function () {
    $success = 'https://www.example.com';
    $webhooks = new Webhooks(
        success: $success,
        failure: 'https://www.google.com',
        cancel: 'https://www.google.com',
        status: 'https://www.google.com',
        mappingScheme: 'https://www.google.com',
    );

    $token = '123456789';

    $webhooks->setToken($token);

    expect($webhooks->token)->toBe($token);
});
