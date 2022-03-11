<?php

namespace Database\Factories;

use App\Models\Jasa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JasaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jasa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jasa_name= $this->faker->unique()->words($nb=2,$asText=true);
        $slug= Str::slug($jasa_name);
        return [
            'name' => $jasa_name,
            'slug' => $slug,
            'address' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(10000,50000),
            'status'=> 'tersedia',
            'quantity'=> $this->faker->numberBetween(100,200);
            'image' => 'digital_' . $this->faker->unique()->numberBetween(1,22) . '.jpg',
            'user_id' => $this->faker->numberBetween(2,4),
            'category_id' => $this->faker->numberBetween(1,10),
            'subcategory_id' => $this->faker->numberBetween(1,10)
            
        ];
    }
}
