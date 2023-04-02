<?php

use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Enum\AmountFormat;
use Sfolador\HeidiPaySaloon\Models\Amount;
use Sfolador\HeidiPaySaloon\Models\CreditInitProduct;
use Sfolador\HeidiPaySaloon\Models\Customer;
use Sfolador\HeidiPaySaloon\Models\Webhooks;
use Sfolador\HeidiPaySaloon\Requests\ContractInitRequest;
use Sfolador\HeidiPaySaloon\Tests\TestHelpers\TestResponse;

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

    $this->contractInitDto = new ContractInitDto($this->amount, $this->customer, $this->webhooks, $this->products);
});

it('has a  body', function () {
    $contractInitRequest = new ContractInitRequest($this->contractInitDto);

    $body = $contractInitRequest->body()->all();

    $expectedKeys = [
        'amount',
        'amount_format',
        'customer_details',
        'redirect_urls',
        'webhooks',
        'products',
    ];

    $keys = array_keys($body);

    expect($keys)->toBe($expectedKeys);
});

it('has a an endpoint', function () {
    $contractInitRequest = new ContractInitRequest($this->contractInitDto);

    expect($contractInitRequest->resolveEndpoint())->toBe('/api/checkout/v1/init/');
});

it('creates a dto from a response', function () {
    $contractInitRequest = new ContractInitRequest($this->contractInitDto);

    $decodedJson = [
        'action' => 'action',
        'redirect_url' => 'redirect_url',
        'external_contract_uuid' => 'external_contract_uuid',
        'application_uuid' => 'application_uuid',
    ];

    $response = TestResponse::make($decodedJson);

    $contactDto = $contractInitRequest->createDtoFromResponse($response);

    expect($contactDto->action)->toBe($decodedJson['action']);
});
