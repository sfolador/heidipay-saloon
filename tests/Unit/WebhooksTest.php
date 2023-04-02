<?php

use Sfolador\HeidiPaySaloon\Models\Webhooks;

beforeEach(function () {
    $this->url = 'https://www.example.com';

    $this->webhooks = new Webhooks(
        success: $this->url.'/success',
        failure: $this->url.'/failure',
        cancel: $this->url.'/cancel',
        status: $this->url.'/status',
        mappingScheme: 'default',
    );
});

it('has a success url', function () {
    expect($this->webhooks->success)->toBe($this->url.'/success');
});

it('has a failure url', function () {
    expect($this->webhooks->failure)->toBe($this->url.'/failure');
});

it('has a cancel url', function () {
    expect($this->webhooks->cancel)->toBe($this->url.'/cancel');
});

it('has a status url', function () {
    expect($this->webhooks->status)->toBe($this->url.'/status');
});

it('has a mappingScheme', function () {
    expect($this->webhooks->mappingScheme)->toBe('default');
});

it('has a token', function () {
    $token = 'token';
    $this->webhooks->setToken($token);

    expect($this->webhooks->token)->toBe($token);
});

it('can be instantiated statically', function () {
    $webhooks = Webhooks::from(
        success: $this->url.'/success',
        failure: $this->url.'/failure',
        cancel: $this->url.'/cancel',
        status: $this->url.'/status',
        mappingScheme: 'default',
    );

    expect($webhooks->success)->toBe($this->url.'/success')
        ->and($webhooks->failure)->toBe($this->url.'/failure')
        ->and($webhooks->cancel)->toBe($this->url.'/cancel')
        ->and($webhooks->status)->toBe($this->url.'/status')
        ->and($webhooks->mappingScheme)->toBe('default');
});

it('can be converted to an array', function () {
    $token = 'token';
    $this->webhooks->setToken($token);
    $array = $this->webhooks->toArray();

    expect($array['success_url'])->toBe($this->url.'/success')
        ->and($array['failure_url'])->toBe($this->url.'/failure')
        ->and($array['cancel_url'])->toBe($this->url.'/cancel')
        ->and($array['status_url'])->toBe($this->url.'/status')
        ->and($array['mapping_scheme'])->toBe('default')
        ->and($array['token'])->toBe('token');
});
