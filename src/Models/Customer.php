<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Models;

class Customer
{
    public function __construct(
        public readonly string $email,
        public readonly ?string $title,
        public readonly string $firstname,
        public readonly string $lastname,
        public readonly ?string $dateOfBirth,
        public readonly ?string $contactNumber,
        public readonly ?string $companyName,
        public readonly ?string $residence,
    ) {
    }

    public static function from(
        string $email,
        ?string $title,
        string $firstname,
        string $lastname,
        ?string $dateOfBirth,
        ?string $contactNumber,
        ?string $companyName,
        ?string $residence,
    ): Customer {
        return new self(
            email: $email,
            title: $title,
            firstname: $firstname,
            lastname: $lastname,
            dateOfBirth: $dateOfBirth,
            contactNumber: $contactNumber,
            companyName: $companyName,
            residence: $residence,
        );
    }

    public function toArray(): array
    {
        return [
            'email_address' => $this->email,
            'title' => $this->title,
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'dateOfBirth' => $this->dateOfBirth,
            'contactNumber' => $this->contactNumber,
            'companyName' => $this->companyName,
            'residence' => $this->residence,
        ];
    }
}
