@extends('layouts.app')
@section('content')
    <div class="jumbotron text-center">
        <h3>404</h3>
        <p>
          We could not find the page you were looking for.
          Meanwhile, you may <a href="{{ url('/home')}}">return to dashboard</a> or try using the search form.
        </p>
    </div>

@endsection
