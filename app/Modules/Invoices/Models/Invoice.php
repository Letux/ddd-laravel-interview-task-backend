<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Domain\Casts\DateCast;
use App\Domain\Casts\DateTimeCast;
use App\Domain\Enums\StatusEnum;
use App\Modules\Companies\Model\Company;
use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Invoice extends Model
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

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoice_product_lines')
            ->withPivot('quantity');
    }

    protected function total(): Attribute
    {
        return new Attribute(
            get: fn () => $this->products->sum(fn ($product) => $product->price->value * $product->pivot->quantity)
        );
    }
}
