<?php

namespace Sfolador\HeidiPaySaloon\Services;

use ReflectionException;
use Saloon\Contracts\Response;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Sfolador\HeidiPaySaloon\Connector\HeidiPayConnector;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Requests\AuthRequest;
use Sfolador\HeidiPaySaloon\Requests\ContractInitRequest;

class HeidiPay
{
    private static HeidiPay $instance;

    private HeidiPayConnector $connector;

    private function __construct(public readonly string $apiUrl)
    {
        $this->connector = new HeidiPayConnector(apiUrl: $apiUrl);
    }

    public static function init(string $apiUrl): HeidiPay
    {
        if (! isset(self::$instance)) {
            self::$instance = new self(apiUrl: $apiUrl);
        }

        return self::$instance;
    }

    public static function getInstance(): self
    {
        return self::$instance;
    }

    /**
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function auth(AuthDto $authDto): mixed
    {
        $request = new AuthRequest($authDto);

        $response = $this->connector->send(new AuthRequest($authDto));

        /* @phpstan-ignore-next-line */
        $this->connector->withTokenAuth($response->json('data.token'));

        return $response->json('data.token');
    }

    /**
     * @return Response
     *
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function contract(ContractInitDto $contractInitDto)
    {
        return $this->connector->send(new ContractInitRequest($contractInitDto));
    }
}
