<?php

declare(strict_types=1);

namespace Sfolador\HeidiPaySaloon\Models;

class Product
{
    public function __construct(
        public readonly ?string $sku,
        public readonly string $name,
        public readonly int $quantity,
        public readonly string $price,
        public readonly ?string $imageThumbnailUrl,
        public readonly ?string $imageOriginalUrl,
        public readonly ?string $description
    ) {
    }

    public static function from(
        ?string $sku,
        string $name,
        int $quantity,
        string $price,
        ?string $imageThumbnailUrl,
        ?string $imageOriginalUrl,
        ?string $description
    ): Product {
        return new self(
            sku: $sku,
            name: $name,
            quantity: $quantity,
            price: $price,
            imageThumbnailUrl: $imageThumbnailUrl,
            imageOriginalUrl: $imageOriginalUrl,
            description: $description
        );
    }

    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'imageThumbnailUrl' => $this->imageThumbnailUrl,
            'imageOriginalUrl' => $this->imageOriginalUrl,
            'description' => $this->description,
        ];
    }
}
