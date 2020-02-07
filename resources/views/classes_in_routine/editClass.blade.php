@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">Edit Class Time</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">Edit Class Time</li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update Class Time for <strong>{{ config('app.name', 'Laravel') }}</strong></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="{{ url('/edit/class/'.$class_details['id']) }}" method="post">
                @csrf
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_time">Start date and time</label> <span style="color:red">*</span></label>
                                    <div class="form-line">
                                        <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ date('Y-m-d\TH:i:s', strtotime($class_details['start_time'])) }}"  autocomplete="start_time"  id="start_time" placeholder="Enter start time">
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
                                    <label for="end_time">End Time and Date</label> <span style="color:red">*</span></label>
                                    <div class="form-line">
                                        <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ date('Y-m-d\TH:i:s', strtotime($class_details['end_time'])) }}"   autocomplete="end_time"  id="end_time" placeholder="Enter start time">
                                        @error('end_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_id">Teacher Name</label> <span style="color:red">*</span></label>
                                    <div class="form-line">
                                        <select class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id">
                                            <option value="">--Select One--</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="room_no">Room No</label> <span style="color:red">*</span></label>
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ $class_details['room_no'] }}"  placeholder="Enter Room No">
                                        <small id="room_no" class="form-text text-muted">example: 102,103</small>
                                        @error('room_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label> <span style="color:red">*</span></label> <br>
                                    @if ($class_details['status'] == 1)
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
