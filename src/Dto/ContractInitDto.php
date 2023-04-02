<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Dto;

use Sfolador\HeidiPaySaloon\Models\Amount;
use Sfolador\HeidiPaySaloon\Models\CreditInitProduct;
use Sfolador\HeidiPaySaloon\Models\Customer;
use Sfolador\HeidiPaySaloon\Models\Webhooks;

class ContractInitDto
{
    /**
     * @param  array<int,CreditInitProduct>  $products
     */
    public function __construct(
        readonly public Amount $amount,
        readonly public Customer $customer,
        readonly public Webhooks $webhooks,
        readonly public array $products)
    {
    }

    /**
     * @param  array<int,CreditInitProduct>  $products
     */
    public static function from(Amount $amount, Customer $customer, Webhooks $webhooks, array $products): self
    {
        return new self(amount: $amount, customer: $customer, webhooks: $webhooks, products: $products);
    }
}
