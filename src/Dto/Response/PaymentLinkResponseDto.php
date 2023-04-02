<?php

namespace Sfolador\HeidiPaySaloon\Dto\Response;

use Saloon\Contracts\Response;

class PaymentLinkResponseDto
{
    public function __construct(readonly public string $payment_link_url)
    {
    }

    public static function fromResponse(Response $response): self
    {
        /* @phpstan-ignore-next-line */
        return new self($response->json('payment_link_url'));
    }
}
