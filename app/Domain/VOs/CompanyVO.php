<?php

declare(strict_types=1);

namespace App\Domain\VOs;

final readonly class CompanyVO
{
    public function __construct(
        public string $name,
        public AddressVO $address,
        public string $phone,
        public string $email,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            new AddressVO(
                $data['street'],
                $data['city'],
                $data['zip']
            ),
            $data['phone'],
            $data['email'],
        );
    }
}
