<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'php', 'laravel 7', 'VueJs', 'React', 'Flutter', 'Crypto', 'Cucina', 'Boolean', 'LearningCode', 'HTML', 'CSS',
        ];

        foreach($tags as $tag)
        {
            Tag::create([
                'slug' => Tag::getSlug($tag),
                'name' => $tag,
            ]);
        }
    }
}
