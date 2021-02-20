@extends("layout.layout-main")

@section("main-content")
  <section id="article" class="container py-5">

    {{-- IMMAGINE E TITOLO DEL POST --}}
    <div class="header text-center">
      <img src="{{ $post->image }}" alt="{{ $post->title }}">
      <h2 class="my-4">{{ $post->title }}</h2>
    </div>

    {{-- TESTO DELL'ARTICOLO E AUTORE --}}
    <p>{{ $post->text }}</p>
    <small class="author"><strong><em>{{ $post->author }}</em></strong></small>
    <hr>

    {{-- SEZIONE DEI COMMENTI --}}
    <h4><strong>COMMENTI</strong></h4>

    <div class="list-section">
      <ul>
        @foreach ($post->comments as $comment)
          <li>
            <small class="author"><strong>{{ $comment->author }}</strong></small>
            <p>{{ $comment->content }}</p>
          </li>
        @endforeach
      </ul>
    </div>

    {{-- FORM PER AGGIUNGERE UN COMMENTO --}}
    <div class="add-comment">
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
      </form>

    </div>
  </section>
@endsection
