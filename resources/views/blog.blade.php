@extends("layout.layout-main")

@section("main-content")
  <div class="container d-flex wrap">
    @foreach ($posts as $post)
      <a class="card" href="{{ route("post", ["slug" => $post->infoPost->slug]) }}">

        <div class="card_content">
          <img src="{{ $post->image }}" alt="{{ $post->title }}">
          <h3 class="text-center">{{ $post->title }}</h3>
        </div>

      </a>
    @endforeach
  </div>
@endsection
