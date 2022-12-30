<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'content' =>$this->faker->realTextBetween(),
            'preview_image' => 'images/preview/nature-3082832_960_720.jpg',
            'main_image' => 'images/preview/nature-3082832_960_720.jpg',
            'category_id' => Category::get()->random()->id,
        ];
    }
}
