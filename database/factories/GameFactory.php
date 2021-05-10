<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
     
        return [
            "name"=>$this->faker->catchPhrase,
            "price"=>$this->faker->numberBetween($min = 10, $max = 130),
            "min_age" =>$this->faker->numberBetween($min = 5, $max = 18),
            "image"=>$this->faker->imageUrl($width = 640, $height = 480,'games'),
            "genre_id"=>$this->faker->numberBetween($min = 1, $max = 20)
        ];
    }
}
