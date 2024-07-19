<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $faker = Faker::create('vi_VN'); // Sử dụng ngôn ngữ tiếng Việt

        return [
            'title' => $faker->sentence, // Tạo câu ngẫu nhiên
            'content' => $faker->paragraph, // Tạo đoạn văn ngẫu nhiên
            'category_id' => \App\Models\Category::factory(), // Giả sử bạn có CategoryFactory
            'tags' => implode(', ', $faker->words(3)), // Tạo chuỗi tags ngẫu nhiên
        ];
    }
}
