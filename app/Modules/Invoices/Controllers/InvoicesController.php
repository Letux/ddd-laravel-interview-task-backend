<?php

namespace App\Modules\Invoices\Controllers;

use App\Modules\Invoices\Models\Invoice;

final class InvoicesController
{
    public function show(Invoice $invoice)
    {
        //
    }

    public function approve(ChangeInvoiceStatusRequest $invoice)
    {
        //
    }

    public function reject(ChangeInvoiceStatusRequest $invoice)
    {
        //
    }
}
