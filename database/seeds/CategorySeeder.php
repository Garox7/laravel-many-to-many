<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'Uncotegorized',
            'Attualità',
            'Mondo dello spettacolo',
            'Politica',
            'Informatica',
            'Finanza',
            'Gossip',
            'Finanza',
            'Cinema',
            'Scuola',
            'Imprenditoria',
        ];

        foreach($categories as $category)
        {
            Category::create([
                'slug' => Category::getSlug($category),
                'name' => $category,
                'description' => $faker->paragraphs(rand(1, 5), true),
            ]);
        }
    }
}
