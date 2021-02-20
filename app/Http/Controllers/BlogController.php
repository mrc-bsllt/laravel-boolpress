<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostInfo;
use App\Comment;
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

    // Aumento di 1 le visualizzazioni (al momento non funziona)
    // $postInfo = PostInfo::where("post_id", $post->id)->first();
    // $postInfo->visits += 1;

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
