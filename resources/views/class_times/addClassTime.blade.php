@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">Add New Class Time</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">New Class Time</li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add new Class Time for <strong>{{ config('app.name', 'Laravel') }}</strong></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="{{ url('/addClassTime') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="time_duration">Time Duration</label>
                                <div class="form-line">
                                    <input type="text" class="form-control @error('time_duration') is-invalid @enderror" name="time_duration" value="{{ old('time_duration') }}"  autocomplete="time_duration"  id="time_duration" placeholder="Enter Time duration">
                                    <small id="time_duration" class="form-text text-muted">example: 8am-10am</small>
                                    @error('time_duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div><!-- /.col -->
@endsection



@section('admin_css')
@endsection


@section('admin_scripts')
@endsection
