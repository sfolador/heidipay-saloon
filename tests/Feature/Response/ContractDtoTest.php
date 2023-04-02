<?php

use Sfolador\HeidiPaySaloon\Dto\Response\ContractDto;

beforeEach(function () {
    $this->action = 'action';
    $this->redirect_url = 'redirect_url';
    $this->external_contract_uuid = 'external_contract_uuid';
    $this->application_uuid = 'application_uuid';

    $this->contractDto = new ContractDto(
        $this->action,
        $this->redirect_url,
        $this->external_contract_uuid,
        $this->application_uuid
    );
});

it('has an action', function () {
    expect($this->contractDto->action)->toBe($this->action);
});

it('has an redirect url', function () {
    expect($this->contractDto->redirect_url)->toBe($this->redirect_url);
});

it('has a contract uuid', function () {
    expect($this->contractDto->external_contract_uuid)->toBe($this->external_contract_uuid);
});

it('has an application uuid', function () {
    expect($this->contractDto->application_uuid)->toBe($this->application_uuid);
});
