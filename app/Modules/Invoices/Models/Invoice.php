<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Domain\Casts\DateCast;
use App\Domain\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'date' => DateCast::class,
        'due_date' => DateCast::class,
        'status' => StatusEnum::class,
        'created_at' => DateCast::class,
        'updated_at' => DateCast::class,
    ];
}
