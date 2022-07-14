<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Waifu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Waifu>
 */
class WaifuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'tags' => 'anime, genshin, keko, yabai',
            'company' => $this->faker->company(),
            'game' => $this->faker->word(),
            'age' => $this->faker->numberBetween(18),
            'descreption' => $this->faker->text(),
            'email' => $this->faker->email(),
            'website' => $this->faker->url(),
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
