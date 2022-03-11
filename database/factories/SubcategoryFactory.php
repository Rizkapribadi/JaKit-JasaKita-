<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subcategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subcategory_name= $this->faker->unique()->words($nb=2,$asText=true);
        $slug= Str::slug($subcategory_name);
        return [
            'name' => $subcategory_name,
            'slug' => $slug,
            'category_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
