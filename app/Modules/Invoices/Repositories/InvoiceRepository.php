<?php

namespace App\Modules\Invoices\Repositories;

use App\Modules\Invoices\Models\Invoice;

final readonly class InvoiceRepository
{

    public static function getById(string $id): Invoice
    {
        return Invoice::findOrFail($id);
    }
}
