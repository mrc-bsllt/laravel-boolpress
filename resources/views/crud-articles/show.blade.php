@extends("../layout.crud-main")

@section("crud-content")
  <section id="post_detail">
    <img src="{{ $post->image }}" alt="{{ $post->title }}">

    <table class="table table-dark table-bordered table-stripped my-3">
      <tr>
        <th class="thead-dark">Titolo</th>
        <td>{{ $post->title }}</td>
      </tr>
      <tr>
        <th class="thead-dark">Testo</th>
        <td>{{ $post->text }}</td>
      </tr>
      <tr>
        <th class="thead-dark">Autore</th>
        <td>{{ $post->author }}</td>
      </tr>
      <tr>
        <th class="thead-dark">Stato</th>
        <td>
          <span>{{ $post->infoPost->status }}</span>
          <i class="fas fa-circle ml-1 {{ $post->infoPost->status == "public" ? "green" : "red" }}"></i>
        </td>
      </tr>
      <tr>
        <th class="thead-dark">Visite</th>
        <td>{{ $post->infoPost->visits }}</td>
      </tr>
      <tr>
        <th class="thead-dark">Commenti</th>
        <td>{{ count($post->comments) }}</td>
      </tr>
      
      <tr>
        <th class="thead-dark">Tags</th>
        <td>
          @foreach ($post->tags as $key => $tag)
            @if ($key == count($post->tags) - 1)
              <span>{{ $tag->tag_name }}</span>
            @else
              <span>{{ $tag->tag_name }}, </span>
            @endif
          @endforeach
        </td>
      </tr>
    </table>

    <a class="btn btn-primary" href="{{ route("crud-articles.index") }}">Indietro</a>
  </section>
@endsection
