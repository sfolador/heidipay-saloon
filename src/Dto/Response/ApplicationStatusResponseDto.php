<?php

namespace Sfolador\HeidiPaySaloon\Dto\Response;

use Saloon\Contracts\Response;

class ApplicationStatusResponseDto
{
    public function __construct(
        readonly public array $statuses
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $statuses = $response->json('statuses');
        $statuses = array_map(fn ($status) => new ExternalContractStatusDto(status: $status['status'], external_contract_id:  $status['external_contract_uuid']), $statuses);

        return new self(statuses: $statuses);
    }
}
