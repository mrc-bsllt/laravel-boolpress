<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostInfo;
use App\Comment;
use App\Tag;
use Illuminate\Support\Str;

class BlogController extends Controller
{
  public function index() {
    $posts = Post::all();

    return view("blog", compact("posts"));
  }

  public function show($slug) {

    $posts = Post::all();
    $post = null;

    foreach ($posts as $postToFilter) {
      $postToFilter->title = Str::slug($postToFilter->title, '-');

      if($postToFilter->title == $slug) {
        $post = $postToFilter;
      }
    }

    $post->title = ucfirst(str_replace('-', ' ', $post->title));

    // Aumento di 1 le visualizzazioni al click dell'articolo
    PostInfo::where('post_id', $post->id)
     ->update([
         'visits' => PostInfo::raw('visits + 1')
     ]);

    return view("post", compact("post"));
  }

  public function addComment(Request $request, $id) {
    $data = $request->all();
    $data["post_id"] = $id;
    $post = Post::findOrfail($id);

    $post->title = Str::slug($post->title);

    $newComment = new Comment();

    $newComment->fill($data)->save();

    return redirect()->route("post", $post->title);

  }

  public function getPostsByTag($slug) {
    $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
            ->select('posts.*')
            ->where('tags.tag_slug', $slug)
            ->get();

    return view("tag_posts", compact("posts"));
  }
}
