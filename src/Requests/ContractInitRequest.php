<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Models\Product;

class ContractInitRequest extends Request implements HasBody
{
    use HasJsonBody;

    public function __construct(readonly protected ContractInitDto $dto)
    {
    }

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/checkout/v1/init/';
    }

    protected function defaultBody(): array
    {
        return [
            'amount' => $this->dto->amount->toArray(),
            'amount_format' => $this->dto->amount->amountFormat,
            'customer_details' => $this->dto->customer->toArray(),
            'redirect_urls' => [
                'success_url' => $this->dto->webhooks->success,
                'failure_url' => $this->dto->webhooks->failure,
                'cancel_url' => $this->dto->webhooks->cancel,
            ],
            'webhooks' => [
                'status_url' => $this->dto->webhooks->status,
                'mapping_scheme' => $this->dto->webhooks->mappingScheme,
                'token' => $this->dto->webhooks->token,
            ],
            'products' => array_map(fn (Product $product) => $product->toArray(), $this->dto->products),
        ];
    }
}
