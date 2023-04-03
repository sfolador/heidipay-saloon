<?php

namespace Sfolador\HeidiPaySaloon\Dto;

class ExternalContractsDto
{
    public function __construct(
        readonly public array $externalContracts
    ) {
    }

    public static function from(array $externalContracts): self
    {
        return new self($externalContracts);
    }
}
