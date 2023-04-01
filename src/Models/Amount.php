<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Models;

use Sfolador\HeidiPaySaloon\Enum\AmountFormat;

class Amount
{
    public function __construct(
        public readonly string $currency,
        public readonly string $amount,
        public readonly AmountFormat $amountFormat)
    {
    }

    public static function from(string $currency, string $amount, AmountFormat $format): Amount
    {
        return new self(currency: $currency, amount: $amount, amountFormat: $format);
    }

    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'amount' => $this->amount,
        ];
    }
}
