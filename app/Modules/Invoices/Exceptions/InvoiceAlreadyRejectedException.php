<?php

namespace App\Modules\Invoices\Exceptions;

final class InvoiceAlreadyRejectedException extends \Exception
{
    function __construct()
    {
        parent::__construct('Invoice already rejected');
    }
}
