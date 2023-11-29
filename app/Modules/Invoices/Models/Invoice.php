<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Domain\Casts\DateCast;
use App\Domain\Casts\DateTimeCast;
use App\Domain\Enums\StatusEnum;
use App\Modules\Companies\Model\Company;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'date' => DateCast::class,
        'due_date' => DateCast::class,
        'status' => StatusEnum::class,
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
