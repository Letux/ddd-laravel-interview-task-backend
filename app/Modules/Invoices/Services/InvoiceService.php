<?php

namespace App\Modules\Invoices\Services;

use App\Domain\Enums\StatusEnum;
use App\Domain\VOs\CompanyVO;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\DTOs\InvoiceDTO;
use App\Modules\Invoices\Exceptions\InvoiceAlreadyApprovedException;
use App\Modules\Invoices\Exceptions\InvoiceAlreadyRejectedException;
use App\Modules\Invoices\Exceptions\InvoiceCannotBeApprovedException;
use App\Modules\Invoices\Models\Invoice;
use App\Modules\Invoices\Repositories\InvoiceRepository;
use Ramsey\Uuid\Uuid;
use Throwable;

final readonly class InvoiceService
{
    public static function show(Invoice $invoice): InvoiceDTO
    {
        // TODO Add boundaries
        // CompanyRepository::getById($invoice->company_id);
        // ProductRepository::getByIds($invoice->products->pluck('id')->toArray());

        return new InvoiceDTO(
            $invoice->load(['company', 'products']),
            CompanyVO::fromArray(config('company'))
        );
    }

    /**
     * @throws InvoiceAlreadyApprovedException
     * @throws InvoiceCannotBeApprovedException
     * @throws Throwable
     */
    public static function approve(string $id, ApprovalFacadeInterface $approvalFacade): void
    {
        $invoice = InvoiceRepository::getById($id);

        throw_if($invoice->isApproved(), new InvoiceAlreadyApprovedException());

        $approvalFacade->approve(new ApprovalDto(
            Uuid::fromString($invoice->id),
            $invoice->status,
            Invoice::class));

        $invoice->saveStatus(StatusEnum::APPROVED);
    }

    /**
     * @throws Throwable
     */
    public static function reject(mixed $id, ApprovalFacadeInterface $approvalFacade)
    {
        $invoice = InvoiceRepository::getById($id);

        throw_if($invoice->isRejected(), new InvoiceAlreadyRejectedException());

        $approvalFacade->reject(new ApprovalDto(
            Uuid::fromString($invoice->id),
            $invoice->status,
            Invoice::class));

        $invoice->saveStatus(StatusEnum::REJECTED);
    }
}
