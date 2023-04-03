<?php

namespace Sfolador\HeidiPaySaloon\Dto\Response;

class ExternalContractStatusDto
{
    public function __construct(
        readonly public string $status,
        readonly public string $external_contract_id,
    ) {
    }
}
