<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['billed', 'paid', 'void']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => fake()->numberBetween(100,20000),
            'status' => $status,
            'billed_date' => fake()->dateTimeThisYear(),
            'paid_date' => $status == 'paid' ? fake()->dateTimeThisMonth() : NULL,
        ];
    }
}
