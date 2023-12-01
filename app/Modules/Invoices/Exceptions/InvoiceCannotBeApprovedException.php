<?php

namespace App\Modules\Invoices\Exceptions;

final class InvoiceCannotBeApprovedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invoice cannot be approved');
    }
}
