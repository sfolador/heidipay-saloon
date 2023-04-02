<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Models;

class PaymentLinkProduct
{
    public function __construct(

        public readonly string $name,
        public readonly string $minorAmount,
        public readonly string $currency,
        public readonly string $description,
    ) {
    }

    public static function from(
         string $name,
         string $minorAmount,
         string $currency,
         string $description,
    ): PaymentLinkProduct {
        return new self(
            name: $name,
            minorAmount: $minorAmount,
            currency: $currency,
            description: $description,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'minor_amount' => $this->minorAmount,
            'currency' => $this->currency,
            'description' => $this->description,
        ];
    }
}
