<?php

use Sfolador\HeidiPaySaloon\Dto\ExternalContractsDto;
use Sfolador\HeidiPaySaloon\Requests\ApplicationStatusRequest;
use Sfolador\HeidiPaySaloon\Tests\TestHelpers\TestResponse;

beforeEach(function () {
    $this->external_contracts = new ExternalContractsDto(
        externalContracts: ['external_contract_uuid']
    );
});

it('has a  body', function () {
    $applicationStatusRequest = new ApplicationStatusRequest($this->external_contracts);
    $body = $applicationStatusRequest->body()->all();

    $expectedKeys = [
        'external_contracts',
    ];

    $keys = array_keys($body);
    expect($keys)->toBe($expectedKeys);
});

it('has a an endpoint', function () {
    $applicationStatusRequest = new ApplicationStatusRequest($this->external_contracts);

    expect($applicationStatusRequest->resolveEndpoint())->toBe('/api/checkout/v2/status/');
});

it('creates a dto from a response', function () {
    $applicationStatusRequest = new ApplicationStatusRequest($this->external_contracts);

    $decodedJson = [
        'statuses' => [
            [
                'status' => 'status',
                'external_contract_uuid' => 'external_contract_id',
            ],
            [
                'status' => 'success',
                'external_contract_uuid' => 'external_contract_id_other',
            ],
        ],

    ];

    $response = TestResponse::make($decodedJson);

    $applicationStatusResponseDto = $applicationStatusRequest->createDtoFromResponse($response);

    expect($applicationStatusResponseDto->statuses)->toHaveCount(2);
});
