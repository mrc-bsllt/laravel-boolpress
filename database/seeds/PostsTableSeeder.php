<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 15 ; $i++) {
        $newPost = new Post();

        $newPost->image = $faker->imageUrl(640, 480, 'animals', true);
        $newPost->title = $faker->sentence();
        $newPost->author = $faker->userName();
        $newPost->text = $faker->paragraphs($faker->randomDigitNot(0), true);

        $newPost->save();
      }
    }
}
