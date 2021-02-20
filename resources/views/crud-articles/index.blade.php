@extends("../layout.crud-main")

@section("crud-content")
  {{-- Numero totale di articoli presenti nel database --}}
  <h3>TOTALE: {{ count($posts) }} ARTICOLI.</h3>

  {{-- Tabella di tutti gli articoli presenti nel database --}}
  <table class="table table-dark table-bordered table-stripped">
    <thead>
      <tr>
        @foreach ($posts->toArray()[0] as $key => $value)
          @if ($key !== "image")
            <th>{{ $key }}</th>
          @endif
        @endforeach
      </tr>
    </thead>

    <tbody>
      @foreach ($posts as $post)
        <tr>

          @foreach ($post->toArray() as $key => $value)
            @if ($key !== "image")
              <td>{{ $key == "text" ? substr($value, 0, 10) : $value }}</td>
            @endif
          @endforeach

          <td><a class="btn btn-secondary btn_info" href="{{ route("crud-articles.show", $post->id) }}"><i class="fas fa-info"></i></a></td>
          <td><a class="btn btn-secondary btn_edit" href="{{ route("crud-articles.edit", $post->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
          <td>
            <form action="{{ route("crud-articles.destroy", $post->id) }}" method="post">
              @csrf
              @method("DELETE")

              <button class="btn btn-secondary btn_delete" type="submit" name="button"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Bottone per aggiungere un nuovo articolo --}}
  <div class="buttons text-right">
    <a class="btn btn-success" href="{{ route("crud-articles.create") }}"><i class="fas fa-plus"></i></a>
  </div>
@endsection
