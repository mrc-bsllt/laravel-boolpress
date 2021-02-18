<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
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

    return view("post", compact("post"));
  }
}
