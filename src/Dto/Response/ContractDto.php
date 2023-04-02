<?php

namespace Sfolador\HeidiPaySaloon\Dto\Response;

use Saloon\Contracts\Response;

class ContractDto
{
    public function __construct(
        readonly public string $action,
        readonly public string $redirect_url,
        readonly public string $external_contract_uuid,
        readonly public string $application_uuid
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return new self(
            /* @phpstan-ignore-next-line */
            $response->json('action'),
            /* @phpstan-ignore-next-line */
            $response->json('redirect_url'),
            /* @phpstan-ignore-next-line */
            $response->json('external_contract_uuid'),
            /* @phpstan-ignore-next-line */
            $response->json('application_uuid')
        );
    }
}
