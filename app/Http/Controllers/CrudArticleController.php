<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\postInfo;
use Illuminate\Support\Str;

class CrudArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();

      return view("crud-articles.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("crud-articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Prendo le informazioni passate dal form
      $data = $request->all();


      // Creo il nuovo post con le informazioni prese dal form
      $newPost = new Post ();
      $newPost->fill($data)->save();


      // Aggiungo la nuova riga di postInfo con cui sarà relazionato
      $newInfo = new PostInfo();

      $newInfo->post_id = $newPost->id;
      $newInfo->slug = Str::slug($data["title"]);
      $newInfo->status = $data["status"];
      $newInfo->save();


      return redirect()->route("crud-articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $crud_article)
    {
      $post = $crud_article;
      //dd($post->infoPost->visits += 1);

      return view("crud-articles.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
