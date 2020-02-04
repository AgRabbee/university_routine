@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                          <div class="text-center">
                            <img class="img-fluid rounded-circle" src="{{ asset('images/'.Auth::user()->profile_image)}}" alt="User profile picture">
                          </div>
                          <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h3>Class Schedule</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
