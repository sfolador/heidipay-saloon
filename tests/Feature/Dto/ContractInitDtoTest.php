<?php

use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Enum\AmountFormat;
use Sfolador\HeidiPaySaloon\Models\Amount;
use Sfolador\HeidiPaySaloon\Models\CreditInitProduct;
use Sfolador\HeidiPaySaloon\Models\Customer;
use Sfolador\HeidiPaySaloon\Models\Webhooks;

beforeEach(function () {
    $this->amount = new Amount(100, 'BRL', AmountFormat::MINOR_UNIT);
    $this->customer = new Customer(
        email: '', title: '', firstname: '', lastname: '', dateOfBirth: '', contactNumber: '', companyName: '', residence: ''
    );

    $this->webhooks = new Webhooks(
        success: 'https://www.google.com',
        failure: 'https://www.google.com',
        cancel: 'https://www.google.com',
        status: 'https://www.google.com',
        mappingScheme: 'default'
    );
    $this->products = [new CreditInitProduct(
        sku: null,
        name: '',
        quantity: 1,
        price: '1.00',
        imageThumbnailUrl: null,
        imageOriginalUrl: null,
        description: null
    )];
});

it('has a amount', function () {
    $contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);

    expect($contractInitDto->amount)->toBe($this->amount);
});

it('has a customer', function () {
    $contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);

    expect($contractInitDto->customer)->toBe($this->customer);
});

it('has webhooks', function () {
    $contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);

    expect($contractInitDto->webhooks)->toBe($this->webhooks);
});

it('has products', function () {
    $contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);

    expect($contractInitDto->products)->toBe($this->products);
});

it('can be instantiated statically', function () {
    $contractInitDto = ContractInitDto::from(
        amount: $this->amount,
        customer: $this->customer,
        webhooks: $this->webhooks,
        products: $this->products
    );

    expect($contractInitDto->amount)->toBe($this->amount)
        ->and($contractInitDto->customer)->toBe($this->customer)
        ->and($contractInitDto->webhooks)->toBe($this->webhooks)
        ->and($contractInitDto->products)->toBe($this->products);
});
