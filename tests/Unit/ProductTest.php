<?php

use Sfolador\HeidiPaySaloon\Models\Product;

it('has a name', function () {
    $name = 'name';
    $product = new Product(
        sku: null,
        name: $name,
        quantity: 1,
        price: '1.00',
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: null
    );

    expect($product->name)->toBe($name);
});

it('has a quantity', function () {
    $quantity = 4;
    $product = new Product(
        sku: null,
        name: '',
        quantity: $quantity,
        price: '1.00',
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: null
    );

    expect($product->quantity)->toBe($quantity);
});

it('has a price', function () {
    $price = '100';
    $product = new Product(
        sku: null,
        name: '',
        quantity: 1,
        price: $price,
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: null
    );

    expect($product->price)->toBe($price);
});

it('can have a sku number', function () {
    $sku = '100';
    $product = new Product(
        sku: $sku,
        name: '',
        quantity: 1,
        price: 100,
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: null
    );

    expect($product->sku)->toBe((string) $sku);
});

it('can have a imageThumbnailUrl', function () {
    $imageThumbnailUrl = 'https://example.com/image.jpg';
    $product = new Product(
        sku:null,
        name: '',
        quantity: 1,
        price: 100,
        imageThumbnailUrl: $imageThumbnailUrl,
        imageOriginalUrl: null,
        description: null
    );

    expect($product->imageThumbnailUrl)->toBe($imageThumbnailUrl);
});

it('can have a imageOriginalUrl', function () {
    $imageOriginalUrl = 'https://example.com/image.jpg';
    $product = new Product(
        sku: null,
        name: '',
        quantity: 1,
        price: 100,
        imageThumbnailUrl: null,
        imageOriginalUrl: $imageOriginalUrl,
        description: null
    );

    expect($product->imageOriginalUrl)->toBe($imageOriginalUrl);
});

it('can have a description', function () {
    $description = 'description';
    $product = new Product(
        sku: null,
        name: '',
        quantity: 1,
        price: 100,
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: $description
    );

    expect($product->description)->toBe($description);
});
