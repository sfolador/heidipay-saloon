<?php

use Sfolador\HeidiPaySaloon\Dto\PaymentLinkDto;
use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;

beforeEach(function () {
    $this->products = [
        new PaymentLinkProduct(
            name: 'name',
            minorAmount: '100',
            currency: 'EUR',
            description: 'description',
        ),
    ];

    $this->deliveryOptions = [
        'delivery_option',
    ];

    $this->quantity = 1;

    $this->dto = new PaymentLinkDto(
        products: $this->products,
        deliveryOptions: $this->deliveryOptions,
        quantity:     $this->quantity,
    );
});

it('has products', function () {
    expect($this->dto->products)->toBe($this->products)->and($this->dto->products)->toBeArray()
        ->and($this->dto->products[0])->toBeInstanceOf(PaymentLinkProduct::class);
});

it('has delivery options', function () {
    expect($this->dto->deliveryOptions)->toBe($this->deliveryOptions);
});

it('has a quantity', function () {
    expect($this->dto->quantity)->toBe($this->quantity);
});

it('can be instantiated statically', function () {
    $dto = PaymentLinkDto::from(
        products: $this->products,
        deliveryOptions: $this->deliveryOptions,
        quantity:     $this->quantity,
    );

    expect($dto->products)->toBe($this->products)->and($dto->products)->toBeArray()
        ->and($dto->products[0])->toBeInstanceOf(PaymentLinkProduct::class)
        ->and($dto->deliveryOptions)->toBe($this->deliveryOptions)
        ->and($dto->quantity)->toBe($this->quantity);
});
