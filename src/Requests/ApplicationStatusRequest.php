<?php

namespace Sfolador\HeidiPaySaloon\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sfolador\HeidiPaySaloon\Dto\ExternalContractsDto;
use Sfolador\HeidiPaySaloon\Dto\Response\ApplicationStatusResponseDto;

class ApplicationStatusRequest extends Request implements HasBody
{
    use HasJsonBody;

    public function __construct(protected readonly ExternalContractsDto $dto)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/checkout/v2/status/';
    }

    protected function defaultBody(): array
    {
        return [
            'external_contracts' => $this->dto->externalContracts,
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return ApplicationStatusResponseDto::fromResponse($response);
    }
}
