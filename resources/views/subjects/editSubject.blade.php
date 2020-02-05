@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">Edit Subject</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">Edit Subject</li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update Subject for <strong>{{ config('app.name', 'Laravel') }}</strong></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="{{ url('/edit/subject/'.$subjectDetails['id']) }}" method="post">
                @csrf
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subject_name">Subject Name</label>
                                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror" name="subject_name" value="{{ $subjectDetails['subject_name'] }}">
                                    @error('subject_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label> <br>
                                    @if ($subjectDetails['status'] == 1)
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="1" checked>Active
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="0">Inactive
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="1">Active
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status" value="0" checked>Inactive
                                            </label>
                                        </div>
                                    @endif
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
