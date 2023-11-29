<?php

declare(strict_types=1);

namespace App\Modules\Products\VOs;

use Illuminate\Support\Number;
use InvalidArgumentException;

final readonly class PriceVO
{
    public string $formatted;

    public function __construct(
        public int $value,
        public string $currency = 'USD',
    ) {
        match ($this->currency) {
            'USD' => $this->formatted = Number::currency($this->value, 'USD'),
            'EUR' => $this->formatted = Number::currency($this->value, 'EUR'),
            'GBP' => $this->formatted = Number::currency($this->value, 'GBP'),
            default => throw new InvalidArgumentException('Invalid currency'),
        };
    }
}
