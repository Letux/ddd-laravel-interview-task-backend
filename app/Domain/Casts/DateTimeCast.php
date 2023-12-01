<?php

declare(strict_types=1);

namespace App\Domain\Casts;

use App\Domain\VOs\DateTimeVO;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Carbon;
use InvalidArgumentException;

final class DateTimeCast implements CastsAttributes
{
    public function get($model, string $key, mixed $value, array $attributes): DateTimeVO
    {
        return new DateTimeVO($value);
    }

    /**
     * @return array<string, ?Carbon>
     */
    public function set($model, string $key, mixed $value, array $attributes): array
    {
        if ($value instanceof DateTimeVO) {
            return [$key => $value->date];
        } else {
            return [$key => $value];
        }
    }
}
