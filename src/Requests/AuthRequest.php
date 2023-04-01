<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;

class AuthRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly AuthDto $dto)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/auth/v1/generate/';
    }

    protected function defaultBody(): array
    {
        return [
            'merchant_key' => $this->dto->merchantKey,
        ];
    }
}
