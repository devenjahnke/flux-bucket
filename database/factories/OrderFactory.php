<?php

namespace Database\Factories;

use App\Actions\GenerateUniqueOrderReferenceNumberAction;
use App\Enums\OrderStatus;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reference_number' => GenerateUniqueOrderReferenceNumberAction::execute(),
            'user_id' => fn () => User::factory(),
            'product_id' => fn () => Product::factory(),
            'status' => OrderStatus::Pending,
            'notes' => $this->faker->paragraph(),
        ];
    }

    public function shipped()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => OrderStatus::Shipped
            ];
        });
    }

    public function fulfilled()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => OrderStatus::Fulfilled
            ];
        });
    }
}
