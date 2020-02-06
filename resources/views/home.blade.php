@extends('layouts.master')
@section('content')


        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card-body">
                              <div class="text-center">
                                <img class="img-fluid rounded-circle" src="{{ asset('images/'.Auth::user()->profile_image)}}" alt="User profile picture">
                              </div>
                              <h5 class="profile-username">{{Auth::user()->name}}</h5>
                              <small class="text-center">
                                  @if (Auth::user()->user_role==2)
                                  {{'Student'}}
                                  @endif
                              </small>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card">
                              <div class="card-header p-3">
                                  <h4><strong>Class Routine</strong></h4>
                              </div><!-- /.card-header -->
                              <div class="card-body card-info">
                                  <div id='calendar' data-route-load-events="{{ route('home')}}"></div>
                              </div><!-- /.card-body -->
                              <div class="card-footer">
                                  <p class="text-center">&copy;All rights reserverd | {{date('Y')}}</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('custom_js')


      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'timeGrid', ],
            // timeZone: 'UTC',
            defaultView: 'timeGridFourDay',
            header: {
              left: 'prev,next',
              center: 'title',
            },
            views: {
              timeGridFourDay: {
                type: 'timeGrid',
                duration: { days: 7 }
              }
            },
            events:  [
                    @foreach($calendar_details as $value)
                    {
                        title : '{{ $value->subjects->subject_name . '\n ' . $value->teachers->name. '\n Room : ' . $value->room_no }}',
                        start : '{{ $value->start_time }}',
                        @if ($value->end_time)
                                end: '{{ $value->end_time }}',
                        @endif
                    },
                    @endforeach
                ],
          });

          calendar.render();
        });

      </script>
      <script src='{{asset('fullcalendar/packages/core/main.js')}}'></script>
      <script src='{{asset('fullcalendar/packages/interaction/main.js')}}'></script>
      <script src='{{asset('fullcalendar/packages/daygrid/main.js')}}'></script>
      <script src='{{asset('fullcalendar/packages/timegrid/main.js')}}'></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
