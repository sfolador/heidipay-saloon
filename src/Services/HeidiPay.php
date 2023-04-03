<?php

namespace Sfolador\HeidiPaySaloon\Services;

use ReflectionException;
use Saloon\Contracts\Response;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Sfolador\HeidiPaySaloon\Connector\HeidiPayConnector;
use Sfolador\HeidiPaySaloon\Dto\AuthDto;
use Sfolador\HeidiPaySaloon\Dto\ContractInitDto;
use Sfolador\HeidiPaySaloon\Dto\PaymentLinkDto;
use Sfolador\HeidiPaySaloon\Requests\AuthRequest;
use Sfolador\HeidiPaySaloon\Requests\ContractInitRequest;
use Sfolador\HeidiPaySaloon\Requests\PaymentLinkRequest;

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

    public function injectConnector(HeidiPayConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function auth(AuthDto $authDto): mixed
    {
        $response = $this->connector->send(new AuthRequest($authDto));

        /* @phpstan-ignore-next-line */
        $this->connector->withTokenAuth($response->json('data.token'));

        return $response->json('data.token');
    }

    /**
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function contract(ContractInitDto $contractInitDto): Response
    {
        return $this->connector->send(new ContractInitRequest($contractInitDto));
    }

    /**
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function paymentLink(PaymentLinkDto $paymentLinkDto): Response
    {
        return $this->connector->send(new PaymentLinkRequest($paymentLinkDto));
    }
}
