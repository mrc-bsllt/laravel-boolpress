@extends("layout.layout-main")

@section("main-content")
  <div class="container cards">
    @foreach ($posts as $post)
      <div class="card">
        <div class="card_content">
          <img src="{{ $post->image }}" alt="{{ $post->title }}">
          <a href="{{ route("post", ["slug" => $post->infoPost->slug]) }}">
            <h3>{{ $post->title }}</h3>
          </a>
        </div>
      </div>
    @endforeach
  </div>
@endsection