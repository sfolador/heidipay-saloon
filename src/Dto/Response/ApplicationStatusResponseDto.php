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
        /**
         * @var array<array{status: string, external_contract_uuid: string}> $statuses
         */
        $statuses = (array) $response->json('statuses');
        $statuses = array_map(fn ($status) => new ExternalContractStatusDto(status: $status['status'], external_contract_id:  $status['external_contract_uuid']), $statuses);

        return new self(statuses: $statuses);
    }
}
