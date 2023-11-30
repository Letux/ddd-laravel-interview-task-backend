<?php

declare(strict_types=1);

namespace App\Modules\Invoices\DTOs;

use App\Modules\Products\DTOs\ProductDTO;
use App\Modules\Products\Models\Product;

final readonly class InvoiceProductDTO
{
    public ProductDTO $product;
    public int $quantity;

    public function __construct(Product $product)
    {
        $this->product = new ProductDTO($product);
        $this->quantity = $product->pivot->quantity;
    }
}
