<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'chat_id' => $this->faker->numberBetween(700000000, 900000000),
            'first_name' => $this->faker->firstName(),
            'second_name' => $this->faker->lastName(),
            'patronymic' => $this->faker->firstName(),
            'phone' => $this->faker->unique->phoneNumber(),
            'email' => $this->faker->unique->email(),
            'experience' => $this->faker->text(),
            'specialist_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
