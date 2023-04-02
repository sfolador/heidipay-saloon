<?php

namespace Sfolador\HeidiPaySaloon\Dto;

use Sfolador\HeidiPaySaloon\Models\PaymentLinkProduct;

class PaymentLinkDto
{
    /**
     * @param  array<int,PaymentLinkProduct>  $products
     */
    public function __construct(readonly public array $products, readonly public array $deliveryOptions, readonly public int|null $quantity)
    {
    }

    /**
     * @param  array<int,PaymentLinkProduct>  $products
     */
    public static function from(array $products, array $deliveryOptions, int|null $quantity): self
    {
        return new self($products, $deliveryOptions, $quantity);
    }
}
