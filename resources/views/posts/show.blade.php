@extends('layouts.app')

@section('content')
  <div class="alert alert-secondary">
    <a href="/posts" class="btn btn-info text-white"><i class="fas fa-chevron-left"></i> Go Back</a>
  </div>

  <h1 class="font-weight-light mb-3 text-info">{{ $post->title }}</h1>
  <div>
    <p class="">{{ $post->body }}</p>
  </div>
  <small style="font-size: 12px; color: rgb(170, 170, 170);">Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
  <hr>
  {{-- Set permission only on loggedin user can see these buttons to edit or delete a post --}}
  @if (!Auth::guest())
    {{-- Set permission user to only able to dit or delete their own post --}}
    @if (Auth::user()->id == $post->user_id)
        
      <a href="/posts/{{ $post->id }}/edit" class="btn btn-info text-white">
        <i class="far fa-edit"></i> Edit
      </a>
      {!! Form::open([ 'action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{-- {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }} --}}
        {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger px-3'] )  }}
      {!! Form::close() !!}
    @endif
  @endif
  
@endsection
