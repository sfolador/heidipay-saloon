<?php

namespace Sfolador\HeidiPaySaloon\Dto;

class AuthDto
{
    public function __construct(readonly public string $merchantKey)
    {
    }

    public static function from(string $merchantKey): self
    {
        return new self($merchantKey);
    }
}
