<?php

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Sfolador\HeidiPaySaloon\Connector\HeidiPayConnector;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Dto\PaymentLinkDto;
use Sfolador\HeidiPaySaloon\Dto\Response\ContractDto;
use Sfolador\HeidiPaySaloon\Dto\Response\PaymentLinkResponseDto;
use Sfolador\HeidiPaySaloon\Enum\AmountFormat;
use Sfolador\HeidiPaySaloon\Models\Amount;
use Sfolador\HeidiPaySaloon\Models\CreditInitProduct;
use Sfolador\HeidiPaySaloon\Models\Customer;
use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;
use Sfolador\HeidiPaySaloon\Models\Webhooks;
use Sfolador\HeidiPaySaloon\Requests\AuthRequest;
use Sfolador\HeidiPaySaloon\Requests\ContractInitRequest;
use Sfolador\HeidiPaySaloon\Requests\PaymentLinkRequest;
use Sfolador\HeidiPaySaloon\Services\HeidiPay;

beforeEach(function () {
    $mockClient = new MockClient([
        AuthRequest::class => MockResponse::fixture('auth'),
        PaymentLinkRequest::class => MockResponse::fixture('payment-link'),
        ContractInitRequest::class => MockResponse::fixture('contract-init'),
    ]);

    $this->connector = new HeidiPayConnector(apiUrl: 'https://sandbox-origination.heidipay.com');

    $this->connector->withMockClient($mockClient);

    $this->products = [new PaymentLinkProduct(
        name: 'product name',
        minorAmount: 1,
        currency: 'EUR',
        description: 'description',
    )];

    $this->deliveryOptions = ['DELIVERY'];

    $this->product = CreditInitProduct::from(sku: null, name: 'Test', quantity: 1, price: 100, imageThumbnailUrl: null, imageOriginalUrl: null, description: '');
    $this->amount = Amount::from(currency: 'EUR', amount: 100, format: AmountFormat::DECIMAL);
    $this->productsForCreditInit = [$this->product];
    $this->consumer = Customer::from(email: 'fa@example.com', title: null, firstname: 'John', lastname: 'Doe', dateOfBirth: null, contactNumber: null, companyName: null, residence: null);

    $this->webhooks = Webhooks::from(
        success: 'https://laravel-10.test/heidi-success',
        failure: 'https://laravel-10.test/heidi-failure',
        cancel: 'https://laravel-10.test/heidi-cancel',
        status: 'https://laravel-10.test/heidi-status',
        mappingScheme: 'default'
    );

    $this->webhooks->setToken('token-123');
    $this->contractInitDto = ContractInitDto::from(amount: $this->amount, customer: $this->consumer, webhooks: $this->webhooks, products: $this->productsForCreditInit);
});

it('is a singleton', function () {
    $heidiPay = HeidiPay::init(apiUrl: 'https://example.com');
    expect($heidiPay)->toBeInstanceOf(HeidiPay::class)
        ->and($heidiPay)->toBe(HeidiPay::getInstance());
});

it('gets a token', function () {
    $heidiPay = HeidiPay::init(apiUrl: 'https://example.com');
    $heidiPay->injectConnector($this->connector);
    $response = $heidiPay->auth(new AuthDto(merchantKey: 'merchantKey'));
    expect($response)->toBeString();
});

it('gets a payment link', function () {
    $heidiPay = HeidiPay::init(apiUrl: 'https://example.com');
    $heidiPay->injectConnector($this->connector);

    $paymentLink = $heidiPay->paymentLink(new PaymentLinkDto(
        products:  $this->products, deliveryOptions: $this->deliveryOptions, quantity: 1
    ));

    expect($paymentLink->dto())
        ->toBeInstanceOf(PaymentLinkResponseDto::class)
        ->and($paymentLink->dto()->payment_link_url)->toBeString();
});

it('gets a contract init ', function () {
    $heidiPay = HeidiPay::init(apiUrl: 'https://example.com');
    $heidiPay->injectConnector($this->connector);

    $response = $heidiPay->contract($this->contractInitDto);
    expect($response->dto())->toBeInstanceOf(ContractDto::class)
        ->and($response->dto()->redirect_url)->toBeString()
        ->and($response->dto()->action)->toBe('REDIRECT')
        ->and($response->dto()->external_contract_uuid)->toBeString()
        ->and($response->dto()->application_uuid)->toBeString();
});
