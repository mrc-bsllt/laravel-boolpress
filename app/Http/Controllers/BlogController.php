<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Comment;

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
}
