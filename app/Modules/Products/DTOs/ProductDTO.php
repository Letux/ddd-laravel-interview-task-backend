<?php

declare(strict_types=1);

namespace App\Modules\Products\DTOs;

use App\Modules\Products\Models\Product;
use App\Modules\Products\VOs\PriceVO;

final readonly class ProductDTO
{
    public ?string $id;
    public string $name;
    public PriceVO $price;
    public string $currency;

    public function __construct(Product $product)
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->currency = $product->currency;
    }
}
