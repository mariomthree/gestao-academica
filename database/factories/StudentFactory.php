<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birthdate' => now()->subYears(15),
            'gender' => $this->faker->randomElement(['M','F']),
            'institution_id' => $this->faker->random_int(1,12),
            'entry_date' => now()->addYears($this->faker->random_int(1,10))
        ];
    }
}
