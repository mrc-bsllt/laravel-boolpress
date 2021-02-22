<?php

use Illuminate\Database\Seeder;
use App\PostInfo;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class PostInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $posts = Post::all();

      foreach ($posts as $post) {
        $newPostInfo = new PostInfo();

        $newPostInfo->post_id = $post->id;
        $newPostInfo->slug = Str::slug($post->title, '-');
        $newPostInfo->status = $faker->randomElement(['Public', 'Private']);
        $newPostInfo->visits = $faker->randomDigit();

        $newPostInfo->save();
      }
    }
}
