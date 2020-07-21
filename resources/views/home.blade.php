@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="font-weight-light">Dashboard</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-info text-white mb-3"><i class="fas fa-plus"></i> Create Post</a>
                    <h3> <span class="text-info">Your Blog</span> Posts </h3>
                    @if (count($posts) > 0)
                    <table class="table table-striped"> 
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td><a href="/posts/{{ $post->id }}" class="text-decoration-none">{{ $post->title }}</a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="/posts/{{ $post->id }}/edit" class="btn text-white px-4 btn-info"><i class="far fa-edit"></i> &nbsp;Edit</a></td>
                                <td>
                                    {!! Form::open([ 'action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{-- {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }} --}}
                                        {{ Form::button('<i class="fa fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-outline-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- <div class="my-3">
                        {{ $posts->links() }}
                        </div> --}}
                    @else
                        <div class="card p-3 my-5">
                            <p>You have no post created yet</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
