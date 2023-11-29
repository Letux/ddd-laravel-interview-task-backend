<?php

namespace App\Modules\Products\Models;

use App\Domain\Casts\DateTimeCast;
use App\Modules\Products\Casts\PriceCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'price' => PriceCast::class,
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
    ];
}
