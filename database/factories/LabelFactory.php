<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Label>
 */
class LabelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function withLabels(array $labels): LabelFactory
    {
        foreach ($labels as $label) {
            $this->state(['name' => $label['name'], 'description' => $label['description']])->create();
        }

        return $this;
    }
}
