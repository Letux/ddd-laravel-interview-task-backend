<?php

namespace App\Modules\Invoices\Exceptions;

final class InvoiceAlreadyApprovedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invoice already approved');
    }
}
