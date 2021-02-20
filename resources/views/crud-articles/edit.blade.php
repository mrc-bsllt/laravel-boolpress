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

  {{-- Form per la modifica dei dati che verrà mandata alla update --}}
  <form action="{{ route("crud-articles.update", $post->id) }}" method="post">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="image">Immagine di copertina</label>
      <input type="text" class="form-control" name="image" id="image" placeholder="Inserisci url immagine" value="{{ $post->image }}">
    </div>

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo" value="{{ $post->title }}">
    </div>

    <div class="form-group">
      <label for="author">Autore</label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Inserisci l'autore del post" value="{{ $post->author }}">
    </div>

    <div class="form-group">
      <label for="text">Testo del post</label>
      <textarea class="form-control" name="text" id="text" rows="8">{{ $post->text }}</textarea>
    </div>

    <div class="form-group">
      <label for="status">State</label>
      <select id="status" class="form-control" name="status">
        <option {{ $post->infoPost->status == "Public" ? 'selected' : '' }}>Public</option>
        <option {{ $post->infoPost->status == "Private" ? 'selected' : '' }}>Private</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection