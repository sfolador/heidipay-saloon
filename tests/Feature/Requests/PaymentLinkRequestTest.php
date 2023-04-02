<?php

use Sfolador\HeidiPaySaloon\Dto\PaymentLinkDto;
use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;
use Sfolador\HeidiPaySaloon\Requests\PaymentLinkRequest;
use Sfolador\HeidiPaySaloon\Tests\TestHelpers\TestResponse;

beforeEach(function () {
    $this->products = [new PaymentLinkProduct(
        name: '',
        minorAmount: 1,
        currency: 'EUR',
        description: '',
    )];

    $this->deliveryOptions = ['delivery'];

    $this->paymentLinkDto = new PaymentLinkDto(
        products:  $this->products, deliveryOptions: $this->deliveryOptions, quantity: 1
    );
});

it('has a  body', function () {
    $paymentLinkRequest = new PaymentLinkRequest($this->paymentLinkDto);
    $body = $paymentLinkRequest->body()->all();

    $expectedKeys = [
        'products',
        'delivery_options',
        'quantity',
    ];

    $keys = array_keys($body);
    expect($keys)->toBe($expectedKeys);
});

it('has a an endpoint', function () {
    $paymentLinkRequest = new PaymentLinkRequest($this->paymentLinkDto);

    expect($paymentLinkRequest->resolveEndpoint())->toBe('/api/checkout/v1/payment-link/');
});

it('creates a dto from a response', function () {
    $paymentLinkRequest = new PaymentLinkRequest($this->paymentLinkDto);

    $decodedJson = [
        'payment_link_url' => 'payment_link_url',
    ];

    $response = TestResponse::make($decodedJson);

    $paymentlinkDto = $paymentLinkRequest->createDtoFromResponse($response);

    expect($paymentlinkDto->payment_link_url)->toBe($decodedJson['payment_link_url']);
});
