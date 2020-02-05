@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">Add New Class in Routine</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">New Class</li>
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add new Class in Routine for <strong>{{ config('app.name', 'Laravel') }}</strong></h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->
            <form role="form" action="{{ url('/addClass') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="subject">Subject Name</label>
                                <div class="form-line">
                                    <select class="form-control @error('subject') is-invalid @enderror" name="subject">
                                        <option value="">--Select One--</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <div class="form-line">
                                    <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" id="datepicker">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="time_duration">Class Time</label>
                                <div class="form-line">
                                    <select class="form-control @error('time_duration') is-invalid @enderror" name="time_duration">
                                        <option value="">--Select One--</option>
                                        @foreach ($class_times as $class_time)
                                            <option value="{{ $class_time->id }}">{{ $class_time->time_duration }}</option>
                                        @endforeach
                                    </select>
                                    @error('time_duration')
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
                                <label for="teacher_id">Teacher Name</label>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="room_no">Room No</label>
                                <div class="form-line">
                                    <input type="text" class="form-control @error('room_no') is-invalid @enderror" name="room_no" value="{{ old('room_no')}}" placeholder="Enter Room No">
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
                                <label for="status">Status</label>
                                <div class="form-line">
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="">--Select One--</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
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
    <script type="text/javascript">
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd",
                minDate: new Date()
            });
        } );
    </script>
@endsection
