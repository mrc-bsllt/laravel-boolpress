@extends("layout.layout-main")

@section("main-content")

  <section id="article" class="container py-5">

    {{-- IMMAGINE E TITOLO DEL POST --}}
    <div class="header text-center">
      <img src="{{ $post->image }}" alt="{{ $post->title }}">
      <h2 class="my-4">{{ $post->title }}</h2>
    </div>

    {{-- TESTO DELL'ARTICOLO, AUTORE E TAGS --}}
    <p>{{ $post->text }}</p>
    <small class="author"><strong><em>{{ $post->author }}</em></strong></small>
    <ul class="list-inline my-3">
      @foreach ($post->tags as $tag)
        <li class="list-inline-item"><a class="btn btn-primary" href="{{ route("tag_posts", $tag->tag_slug) }}">{{ $tag->tag_name }}</a></li>
      @endforeach
    </ul>
    <hr>

    {{-- CAROSELLO DI IMMAGINI --}}
    <div class="slick-carousel">
      @foreach ($post->images as $image)
        <div>
          <img style="width: 90%" src="{{ $image->url }}">
        </div>
      @endforeach
    </div>

    <hr>
    {{-- SEZIONE DEI COMMENTI --}}
    <h4><strong>COMMENTI</strong></h4>

    <div class="list-section">
      <ul>
        @foreach ($post->comments as $comment)
          <li class="shadow p-3 mb-5 bg-white rounded position-relative">
            <small class="author"><strong>{{ $comment->author }}</strong></small>
            <p>{{ $comment->content }}</p>
            <small class="date">{{ $comment->created_at->locale("it")->isoFormat("dddd DD/MMMM/YYYY HH:mm") }}</small>
          </li>
        @endforeach
      </ul>
    </div>

    {{-- FORM PER AGGIUNGERE UN COMMENTO --}}
    <div class="add-comment my-5">
      <form action="{{ route("add-comment", $post->id) }}" method="post">
        @csrf
        @method("POST")

        <div class="form-group">
          <label for="author">Username</label>
          <input type="text" class="form-control" id="author" name="author" value="">
        </div>
        <div class="form-group">
          <label for="content">Inserisci un commento</label>
          <textarea type="text" class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-success" name="button">Inserisci!</button>
        <a class="btn btn-secondary" href="{{ route("blog") }}">Indietro</a>
      </form>

    </div>
  </section>
@endsection
