<?php

use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;

beforeEach(function () {
    $this->name = 'name';
    $this->minorAmount = '100';
    $this->currency = 'EUR';
    $this->description = 'description';

    $this->product = new PaymentLinkProduct(
        name:  $this->name,
        minorAmount: $this->minorAmount,
        currency: $this->currency,
        description: $this->description
    );
});

it('has a name', function () {
    expect($this->product->name)->toBe($this->name);
});

it('has a minorAmount', function () {
    expect($this->product->minorAmount)->toBe($this->minorAmount);
});

it('has a currency', function () {
    expect($this->product->currency)->toBe($this->currency);
});

it('has a description', function () {
    expect($this->product->description)->toBe($this->description);
});

it('can be instantiated statically', function () {
    $product = PaymentLinkProduct::from(
        name:  $this->name,
        minorAmount: $this->minorAmount,
        currency: $this->currency,
        description: $this->description
    );

    expect($product->name)->toBe($this->name)
        ->and($product->minorAmount)->toBe($this->minorAmount)
        ->and($product->currency)->toBe($this->currency)
        ->and($product->description)->toBe($this->description);
});

it('can be converted to array', function () {
    $array = $this->product->toArray();

    expect($array['name'])->toBe($this->name)
        ->and($array['minor_amount'])->toBe($this->minorAmount)
        ->and($array['currency'])->toBe($this->currency)
        ->and($array['description'])->toBe($this->description);
});
