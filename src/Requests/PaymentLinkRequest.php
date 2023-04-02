<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use Sfolador\HeidiPaySaloon\Dto\PaymentLinkDto;
use Sfolador\HeidiPaySaloon\Dto\Response\PaymentLinkResponseDto;
use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;

class PaymentLinkRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected readonly PaymentLinkDto $dto)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/checkout/v1/payment-link/';
    }

    protected function defaultBody(): array
    {
        return [
            'products' => array_map(fn (PaymentLinkProduct $product) => $product->toArray(), $this->dto->products),
            'delivery_options' => $this->dto->deliveryOptions,
            'quantity' => $this->dto->quantity,
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PaymentLinkResponseDto::fromResponse($response);
    }
}
