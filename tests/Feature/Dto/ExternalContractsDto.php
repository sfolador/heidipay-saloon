<?php

use Sfolador\HeidiPaySaloon\Dto\ExternalContractsDto;

it('has external contracts', function () {
    $dto = new ExternalContractsDto(externalContracts: ['external_contract_uuid']);
    expect($dto->externalContracts)->toBe(['external_contract_uuid']);
});

it('can be instantiated statically', function () {
    $dto = ExternalContractsDto::from(['external_contract_uuid']);

    expect($dto)->toBeInstanceOf(ExternalContractsDto::class)
        ->and($dto->externalContracts)->toBe(['external_contract_uuid']);
});
