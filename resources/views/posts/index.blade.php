@extends('layouts.app')

@section('content')
  <h1 class="font-weight-light mt-4 mb-3"> <span class="text-info">Blog</span> Posts</h1>
  @if (count($posts) > 0)
  @foreach ($posts as $post)
      <div class="card p-3 mb-3 shadow rounded">
        <h3 class="font-weight-light"><a class="text-info text-decoration-none" href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
        <p>{{ $post->body }}</p>
        <small style="font-size: 12px; color: rgb(170, 170, 170);">Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
      </div>
  @endforeach
  <div class="my-3">
    {{ $posts->links() }}
  </div>
  @else
    <h3 class="font-weight-light">No Posts found</h3>
  @endif
@endsection