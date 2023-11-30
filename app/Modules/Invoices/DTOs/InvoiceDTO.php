<?php

namespace App\Modules\Invoices\DTOs;

use App\Domain\VOs\CompanyVO;
use App\Domain\VOs\DateVO;
use App\Modules\Companies\DTOs\CompanyDTO;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Products\VOs\PriceVO;
use Illuminate\Support\Collection;

final readonly class InvoiceDTO
{
    public ?string $id;
    public string $number;
    public DateVO $date;
    public DateVO $dueDate;
    public CompanyVO $company;
    public CompanyDTO $billedCompany;
    public Collection $products;
    public PriceVO $total;

    public function __construct(Invoice $invoice, CompanyVO $company)
    {
        $this->id = $invoice->id;
        $this->number = $invoice->number;
        $this->date = $invoice->date;
        $this->dueDate = $invoice->due_date;
        $this->company = $company;
        $this->billedCompany = new CompanyDTO($invoice->company);
        $this->products = $invoice->products->map(fn ($product) => new InvoiceProductDTO($product));
        $this->total = new PriceVO($invoice->total);
    }
}
