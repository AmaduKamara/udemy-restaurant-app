@extends('layouts.app')

@section('content')
  <h1 class="font-weight-light mt-4 mb-3"><span class="text-info">Edit</span> Post</h1>
  {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}

    <div class="form-group">
      {{ Form::label('title', 'Post Title') }}
      {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Enter Post Title Here...']) }}
    </div>
    <div class="form-group">
      {{ Form::label('body', 'Post Body') }}
      {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Say Your Mind here...']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
   
    {{-- {{ Form::submit('Update', ['class' => 'btn btn-info px-5 fa-edit']) }} --}}
    {{ Form::button('<i class="fa fa-edit"></i> Update', ['type' => 'submit', 'class' => 'btn btn-info px-4 text-white'] )}}
  {!! Form::close() !!}

@endsection
