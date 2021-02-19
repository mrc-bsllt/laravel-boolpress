@extends("layout.layout-main")

@section("main-content")
  <div class="flex_container">
    <div class="container post-content">
      <div class="header text-center">
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <h2>{{ $post->title }}</h2>
      </div>
      <p>{{ $post->text }}</p>
      <small>({{ $post->author }})</small>
      <div class="comments">
        <h4>COMMENTI:</h4>

        <div class="list-section">
          <ul>
            @foreach ($post->comments as $comment)
              <li>
                <small><strong>{{ $comment->author }}</strong></small>
                <p>{{ $comment->content }}</p>
              </li>
            @endforeach
          </ul>
        </div>

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
      </div>
    </div>
  </div>
@endsection
