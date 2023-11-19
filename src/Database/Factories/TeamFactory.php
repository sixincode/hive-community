<?php

namespace Sixincode\HiveCommunity\Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class TeamFactory extends Factory
{
    protected $model = Team::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->unique()->company(),
            'user_id'       => User::factory(),
            'description'   => $this->faker->unique()->realText(600,4),
            // 'user_global'   => Str::uuid(),
            'personal_team' => true,
            // 'global'        => Str::uuid(),
        ];
    }
}
