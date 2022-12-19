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
            'preview_image' => 'images/vzHVWH6Ag2RU2b201peDJzpQrFXmYPVtHbTMr3Nl.jpg',
            'main_image' => '/images/vzHVWH6Ag2RU2b201peDJzpQrFXmYPVtHbTMr3Nl.jpg',
            'category_id' => Category::get()->random()->id,
        ];
    }
}
