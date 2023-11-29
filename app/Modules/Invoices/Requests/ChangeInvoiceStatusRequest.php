<?php

namespace App\Modules\Invoices\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class ChangeInvoiceStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'uuid', 'exists:invoices,id'],
        ];
    }
}
