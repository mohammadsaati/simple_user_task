<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_text' => $this->faker->text,
            'user_id' => $this->faker->randomElement(User::query()->pluck('id')->toArray()),
            'post_id' => $this->faker->randomElement(Post::query()->pluck('id')->toArray()),
        ];
    }
}
