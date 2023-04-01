<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Connector;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class HeidiPayConnector extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
       protected string $apiUrl
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return $this->apiUrl;
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
