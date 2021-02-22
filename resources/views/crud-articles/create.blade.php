@extends("../layout.crud-main")

@section("crud-content")

  {{-- Messaggio di errore in caso di dati non corretti --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Form per la compilazione dei dati che verrà mandata allo store --}}
  <form action="{{ route("crud-articles.store") }}" method="post">
    @csrf
    @method("POST")

    <div class="form-group">
      <label for="image">Immagine di copertina</label>
      <input type="text" class="form-control" name="image" id="image" placeholder="Inserisci url immagine" value="{{ old("image") }}">
    </div>

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo" value="{{ old("title") }}">
    </div>

    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Inserisci l'autore del post" value="{{ old("author") }}">
    </div>

    <div class="form-group">
      <label for="text">Testo del post</label>
      <textarea class="form-control" name="text" id="text" rows="8">{{ old("text") }}</textarea>
    </div>

    <div class="form-group">
      <label for="status">State</label>
      <select id="status" class="form-control" name="status" value="{{ old("status") }}">
        <option>Public</option>
        <option>Private</option>
      </select>
    </div>

    @foreach ($tags as $tag)
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->tag_name }}</label>
      </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Aggiungi</button>
  </form>
@endsection
