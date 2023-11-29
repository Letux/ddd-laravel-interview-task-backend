<?php

declare(strict_types=1);

namespace App\Domain\VOs;

use Illuminate\Support\Carbon;

final readonly class DateVO
{
    private const FORMAT = 'm/d/Y';

    public ?Carbon $date;
    public string $formatted;

    public function __construct(Carbon|string|null $date)
    {
        if (is_null($date)) {
            $this->date = null;
            $this->formatted = '';
            return;
        } elseif (is_string($date)) {
            $this->date = Carbon::parse($date);
        } else {
            $this->date = $date->copy();
        }

        $this->formatted = $this->date->format(self::FORMAT);
    }
}
