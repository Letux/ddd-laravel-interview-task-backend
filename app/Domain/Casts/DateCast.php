<?php

declare(strict_types=1);

namespace App\Domain\Casts;

use App\Domain\VOs\DateVO;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

final class DateCast implements CastsAttributes
{
    public function get($model, string $key, mixed $value, array $attributes): DateVO
    {
        return new DateVO($value);
    }

    /**
     * @return array<string, string>
     */
    public function set($model, string $key, mixed $value, array $attributes): array
    {
        if (!$value instanceof DateVO) {
            throw new InvalidArgumentException('The given value is not an DateVO instance.');
        }

        return [$key => $value->date];
    }
}
