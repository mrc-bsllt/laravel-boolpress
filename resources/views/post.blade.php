@extends("layout.layout-main")

@section("main-content")
  <div class="flex_container">
    <div class="container post-content">
      <h2 class="text-center">{{ $post->title }} <small>({{ $post->author }})</small></h2>
      <p>{{ $post->text }}</p>
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
        
      </div>
    </div>
  </div>
@endsection
