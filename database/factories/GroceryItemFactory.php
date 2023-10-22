<?php

namespace Database\Factories;

use App\Models\GroceryItem;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroceryItem>
 */
class GroceryItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GroceryItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ProductName' => $this->faker->word,
            'Price' => $this->faker->randomFloat(2, 0, 100),
            'CategoryID' => function () {
                return Category::inRandomOrder()->first()->CategoryID;
            },
            'DepartmentID' => function () {
                return Department::inRandomOrder()->first()->DepartmentID;
            },
            'Stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
