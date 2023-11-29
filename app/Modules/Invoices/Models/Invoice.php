<?php

namespace App\Modules\Invoices\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string',
        'date' => 'date',
        'due_date' => 'datetime',
        'company_id' => 'string',
    ];
}
