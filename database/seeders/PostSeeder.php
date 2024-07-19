<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');

        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $tagIds = DB::table('tags')->pluck('id')->toArray();

        foreach(range(1, 10) as $index) {
            Post::create([
                'title' => $faker->realText(50),
                'content' => $faker->realText(200),
                'category_id' => $faker->randomElement($categoryIds),
                'tag_id' => $faker->randomElement($tagIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
