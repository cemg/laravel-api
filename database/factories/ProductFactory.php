<?php


namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->sentence(3);

        return [
            'name'        => $product_name,
            'slug'        => Str::slug($product_name),
            'description' => $this->faker->paragraph(5),
            'price'       => mt_rand(10, 100) / 10
        ];
    }
}
