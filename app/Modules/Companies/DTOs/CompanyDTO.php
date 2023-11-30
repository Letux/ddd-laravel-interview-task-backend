<?php

declare(strict_types=1);

namespace App\Modules\Companies\DTOs;

use App\Domain\VOs\AddressVO;
use App\Modules\Companies\Model\Company;

final readonly class CompanyDTO
{
    public ?string $id;
    public string $name;
    public AddressVO $address;
    public string $phone;
    public string $email;

    public function __construct(Company $company)
    {
        $this->id = $company->id;
        $this->name = $company->name;
        $this->address = $company->address;
        $this->phone = $company->phone;
        $this->email = $company->email;
    }
}
