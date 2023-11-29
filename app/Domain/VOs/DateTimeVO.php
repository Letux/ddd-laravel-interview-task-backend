<?php

declare(strict_types=1);

namespace App\Domain\VOs;

use Illuminate\Support\Carbon;

final readonly class DateTimeVO
{
    private const FORMAT_FULL = 'm/d/Y H:i:s';
    private const FORMAT = 'm/d/Y H:i';
    private const FORMAT_DATE = 'm/d/Y';

    public ?Carbon $date;
    public string $formatted;
    public string $formattedFull;
    public string $formattedDate;

    public function __construct(Carbon|string|null $date)
    {
        if (is_null($date)) {
            $this->date = null;
            $this->formatted = '';
            $this->formattedFull = '';
            $this->formattedDate = '';
            return;
        } elseif (is_string($date)) {
            $this->date = Carbon::parse($date);
        } else {
            $this->date = $date->copy();
        }

        $this->formatted = $this->date->format(self::FORMAT);
        $this->formattedFull = $this->date->format(self::FORMAT_FULL);
        $this->formattedDate = $this->date->format(self::FORMAT_DATE);
    }
}
