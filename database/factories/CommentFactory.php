<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'article_id' => Article::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'text' => $this->faker->realText(50)
        ];
    }
}
