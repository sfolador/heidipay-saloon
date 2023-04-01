<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Models;

class Webhooks
{
    public string $token;

    public function __construct(
        public readonly string $success,
        public readonly string $failure,
        public readonly string $cancel,
        public readonly string $status,
        public readonly string $mappingScheme,

    ) {
        $this->token = '';
    }

    public static function from(string $success, string $failure, string $cancel, string $status, string $mappingScheme): Webhooks
    {
        return new self(
            success: $success,
            failure: $failure,
            cancel: $cancel,
            status: $status,
            mappingScheme: $mappingScheme
        );
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function toArray(): array
    {
        return [
            'success_url' => $this->success,
            'failure_url' => $this->failure,
            'cancel_url' => $this->cancel,
            'status_url' => $this->status,
            'mapping_scheme' => $this->mappingScheme,
            'token' => $this->token,
        ];
    }
}
