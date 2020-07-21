@extends('layouts.app')

@section('content')
  <h1 class="font-weight-light mt-4 mb-3"><span class="text-info">Create</span> Post</h1>
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}

    <div class="form-group">
      {{ Form::label('title', 'Post Title') }}
      {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter Post Title Here...']) }}
    </div>
    <div class="form-group">
      {{ Form::label('body', 'Post Body') }}
      {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Say Your Mind here...']) }}
    </div>
    {{-- {{ Form::submit('Submit', ['class' => 'btn btn-info px-5']) }} --}}
    {{ Form::button('<i class="fa fa-plus"></i> Submit Post', ['type' => 'submit', 'class' => 'btn btn-info px-5 text-white'] )}}
  {!! Form::close() !!}
@endsection
