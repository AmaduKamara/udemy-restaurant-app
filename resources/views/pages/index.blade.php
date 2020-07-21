@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1 class="font-weight-light">{{ $title }}</h1>
    <p>Let your voice be heard. Make your openion count.</p>
    <p>Make your contribution to the development of Sierra Leone by posting your concern so people will get to know</p>
    <p><a href="/login" class="btn btn-info text-white px-5" role="button"><i class="fas fa-sign-in-alt"></i> Login</a>&nbsp;&nbsp;&nbsp;<a href="/register" class="btn btn-outline-info px-5" role="button"><i class="fas fa-user-circle"></i> Register</a> </p>
  </div>
@endsection
