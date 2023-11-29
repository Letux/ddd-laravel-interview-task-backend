<?php

declare(strict_types=1);

namespace App\Modules\Companies\Model;

use App\Domain\Casts\DateTimeCast;
use App\Modules\Companies\VOs\AddressVO;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasUuids;

    protected $casts = [
        'created_at' => DateTimeCast::class,
        'updated_at' => DateTimeCast::class,
    ];

    protected $appends = [
        'address',
    ];

    protected function address(): Attribute
    {
        return new Attribute(
            get: fn () => new AddressVO(
                $this->street,
                $this->city,
                $this->zip
            ),
        );
    }
}
