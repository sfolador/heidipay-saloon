<?php

use Sfolador\HeidiPaySaloon\Models\CreditInitProduct;

beforeEach(function () {
    $this->name = 'name';
    $this->quantity = 4;
    $this->price = '100';
    $this->sku = '100';
    $this->imageThumbnailUrl = 'https://example.com/image.jpg';
    $this->imageOriginalUrl = 'https://example.com/image.jpg';
    $this->description = 'description';

    $this->product = new CreditInitProduct(
        sku: $this->sku,
        name: $this->name,
        quantity: $this->quantity,
        price: $this->price,
        imageThumbnailUrl: $this->imageThumbnailUrl,
        imageOriginalUrl: $this->imageOriginalUrl,
        description: $this->description
    );
});

it('has a name', function () {
    expect($this->product->name)->toBe($this->name);
});

it('has a quantity', function () {
    expect($this->product->quantity)->toBe($this->quantity);
});

it('has a price', function () {
    expect($this->product->price)->toBe($this->price);
});

it('can have a sku number', function () {
    expect($this->product->sku)->toBe($this->sku);
});

it('can have a imageThumbnailUrl', function () {
    expect($this->product->imageThumbnailUrl)->toBe($this->imageThumbnailUrl);
});

it('can have a imageOriginalUrl', function () {
    expect($this->product->imageOriginalUrl)->toBe($this->imageOriginalUrl);
});

it('can have a description', function () {
    expect($this->product->description)->toBe($this->description);
});

it('can be instantiated statically', function () {
    $product = CreditInitProduct::from(
        $this->sku,
        $this->name,
        $this->quantity,
        $this->price,
        $this->imageThumbnailUrl,
        $this->imageOriginalUrl,
        $this->description
    );

    expect($product->sku)->toBe($this->sku)
        ->and($product->name)->toBe($this->name)
        ->and($product->quantity)->toBe($this->quantity)
        ->and($product->price)->toBe($this->price)
        ->and($product->imageThumbnailUrl)->toBe($this->imageThumbnailUrl)
        ->and($product->imageOriginalUrl)->toBe($this->imageOriginalUrl)
        ->and($product->description)->toBe($this->description);
});
