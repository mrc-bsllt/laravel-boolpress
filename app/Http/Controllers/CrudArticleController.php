<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\postInfo;
use App\Tag;
use App\Image;
use Illuminate\Support\Str;

class CrudArticleController extends Controller
{

  // Validazione dei dati inseriti
  private $validationRules = [
    "image" => "required|max:500",
    "title" => "required|max:60",
    "author" => "required|max:30"
  ];

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
      $tags = Tag::all();
      $images = Image::all();

      return view("crud-articles.create", compact("tags", "images"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Controllo se i dati inseriti dall'utente sono corretti
      $request->validate($this->validationRules);

      // Prendo le informazioni passate dal form
      $data = $request->all();

      // Creo il nuovo post con le informazioni prese dal form
      $newPost = new Post ();
      $newPost->fill($data)->save();

      // Completo il data per utilizzare il fillabe della tabella post_infos
      $data["post_id"] = $newPost->id;
      $data["slug"] = Str::slug($newPost->title);

      // Aggiungo la nuova riga di postInfo con cui sarà relazionato
      $newInfo = new PostInfo();
      $newInfo->fill($data)->save();

      // Aggiungo i tags che sono stati selezionati
      $newPost->tags()->attach($data["tags"]);

      // Aggiungo le immagini selezionate dalle checkbox
      $newPost->images()->attach($data["images"]);

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

      return view("crud-articles.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $crud_article)
    {
      $post = $crud_article;
      $tags = Tag::all();

      return view("crud-articles.edit", compact("post", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $crud_article)
    {
      // Controllo se i dati inseriti dall'utente sono corretti
      $request->validate($this->validationRules);

      // Prendo le informazioni passate dal form e definisco il post
      $data = $request->all();
      $post = $crud_article;

      // Salvo le modifiche nella tabella posts
      $post->update($data);

      // Salvo le modifiche anche nella tabella relazionata post-infos
      $infoPost = PostInfo::where("post_id", $post->id)->first();
      $infoPost->update($data);

      // Salvo le modifiche fatte per la scelta dei tags
      if (!empty($data["tags"])) {
        $post->tags()->sync($data["tags"]);
      } else {
        $post->tags()->detach();
      }

      return redirect()->route("crud-articles.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::findOrFail($id);

      $post->delete();

      return redirect()->route("crud-articles.index");
    }
}
