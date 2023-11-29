<?php

declare(strict_types=1);

namespace App\Modules\Products\Casts;

use App\Modules\Products\VOs\PriceVO;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

final class PriceCast implements CastsAttributes
{
    public function get($model, string $key, mixed $value, array $attributes): PriceVO
    {
        return new PriceVO($value);
    }

    /**
     * @return array<string, int>
     */
    public function set($model, string $key, mixed $value, array $attributes): array
    {
        if (!$value instanceof PriceVO) {
            throw new InvalidArgumentException('The given value is not an PriceVO instance.');
        }

        return [$key => $value->value];
    }
}
