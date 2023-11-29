<?php

namespace Database\Factories\Modules\Invoices\Factories;

use App\Modules\Invoices\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'number' => $this->faker->word(),
            'date' => Carbon::now(),
            'due_date' => Carbon::now(),
            'company_id' => $this->faker->words(),
            'status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
