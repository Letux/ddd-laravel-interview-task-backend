<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Controllers;

use App\Domain\VOs\CompanyVO;
use App\Modules\Invoices\DTOs\InvoiceDTO;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Requests\ChangeInvoiceStatusRequest;

final class InvoicesController
{
    public function show(Invoice $invoice): void
    {
        $data = new InvoiceDTO(
            $invoice->load(['company', 'products']),
            CompanyVO::fromArray(config('company'))
        );

        dd($data);
    }

    public function approve(ChangeInvoiceStatusRequest $invoice): void
    {
        //
    }

    public function reject(ChangeInvoiceStatusRequest $invoice): void
    {
        //
    }
}
