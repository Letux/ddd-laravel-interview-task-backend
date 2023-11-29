<?php

declare(strict_types=1);

namespace App\Modules\Companies\VOs;

final readonly class AddressVO
{
    public string $firstLine;
    public string $secondLine;

    public function __construct(public string $street, public string $city, public string $zip)
    {
        $this->firstLine = $street;
        $this->secondLine = $city . ', ' . $zip;
    }
}
