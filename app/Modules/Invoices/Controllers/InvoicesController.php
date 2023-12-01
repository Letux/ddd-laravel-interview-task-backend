<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Controllers;

use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Requests\ChangeInvoiceStatusRequest;
use App\Modules\Invoices\Services\InvoiceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class InvoicesController
{
    public function show(Invoice $invoice): View
    {
        $data = InvoiceService::show($invoice);

        dd($data);

//         return view('invoices.show', compact('data'));
    }

    public function approve(ChangeInvoiceStatusRequest $invoice, ApprovalFacadeInterface $approvalFacade): RedirectResponse
    {
        InvoiceService::approve($invoice->id, $approvalFacade);

        dd('Invoice approved!');

//        return redirect()->route('invoices.show', $invoice->id);
    }

    public function reject(ChangeInvoiceStatusRequest $invoice, ApprovalFacadeInterface $approvalFacade): RedirectResponse
    {
        InvoiceService::reject($invoice->id, $approvalFacade);

        dd('Invoice rejected!');

//        return redirect()->route('invoices.show', $invoice->id);
    }
}
