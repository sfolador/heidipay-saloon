<?php

namespace Sfolador\HeidiPaySaloon\Tests\TestHelpers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Saloon\Contracts\ArrayStore;
use Saloon\Contracts\PendingRequest;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;
use Saloon\Traits\Responses\HasResponseHelpers;
use Throwable;

class TestResponse implements Response
{
    use HasResponseHelpers;

    protected $psrResponse;

    protected $pendingRequest;

    protected $senderException;

    protected array $decodedJson;

    public static function fromPsrResponse(ResponseInterface $psrResponse, PendingRequest $pendingRequest, ?Throwable $senderException = null): static
    {
        return new static($psrResponse, $pendingRequest, $senderException);
    }

    public function getPsrResponse(): ResponseInterface
    {
        // TODO: Implement getPsrResponse() method.

        return $this->psrResponse;
    }

    public function getPendingRequest(): PendingRequest
    {
        // TODO: Implement getPendingRequest() method.

        return $this->pendingRequest;
    }

//    public function json(int|string|null $key = null, mixed $default = null): mixed
//    {
//        return $this->decodedJson;
//    }

    public function body(): string
    {
        // TODO: Implement body() method.

        return '';
    }

    public function stream(): StreamInterface
    {
        // TODO: Implement stream() method.

        return $this->psrResponse->getBody();
    }

    public function status(): int
    {
        // TODO: Implement status() method.
        return 200;
    }

    public function getRequest(): Request
    {
        // TODO: Implement getRequest() method.

        return $this->pendingRequest->getRequest();
    }

    public function getSenderException(): ?Throwable
    {
        // TODO: Implement getSenderException() method.

        return $this->senderException;
    }

    public function headers(): ArrayStore
    {
        // TODO: Implement headers() method.

        return new \Saloon\Repositories\ArrayStore([]);
    }

    public static function make($decodedJson): static
    {
        $static = new static();
        $static->decodedJson = $decodedJson;

        return $static;
    }
}
