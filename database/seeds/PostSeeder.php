<?php

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category = Category::all('id')->all();
        $tags = Tag::all()->pluck('id');
        $tagCount = count($tags);

        for ($i=0; $i < 20 ; $i++) {
            $title = $faker->words(rand(2, 4), true);

            $n = rand(0, 85);
            if($n)
            {
                $content = new File(__DIR__ . '/../../storage/app/random_img/picsum' . $n . '.jpg');
                $img_path = Storage::put('uploads', $content);
            } else {
                $img_path = null;
            };

            $post = Post::create([
                'category_id' => $faker->randomElement($category)->id,
                'slug' => Post::getSlug($title),
                'title' => $title,
                'uploaded_img' => $img_path,
                'content' => $faker->paragraphs(rand(10, 20), true),
                'excerpt' => $faker->paragraph(),
            ]);

            $post->tags()->attach($faker->randomElements($tags, rand(0, ($tagCount > 10) ? 10 : $tagCount)));
        }
    }
}
