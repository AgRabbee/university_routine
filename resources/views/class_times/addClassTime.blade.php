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
                                <label for="start_time">Start date and time</label>
                                <div class="form-line">
                                    <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}"  autocomplete="start_time"  id="start_time" placeholder="Enter start time">
                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_time">End Time and Date</label>
                                <div class="form-line">
                                    <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}"  autocomplete="end_time"  id="end_time" placeholder="Enter start time">
                                    @error('end_time')
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
