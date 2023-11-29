<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Controllers;

use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Requests\ChangeInvoiceStatusRequest;

final class InvoicesController
{
    public function show(Invoice $invoice): Invoice
    {
        return $invoice->load(['company', 'products']);
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
