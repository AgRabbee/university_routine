@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">All Class Times</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All Class Times</li>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Class Times of <strong>{{ config('app.name', 'Laravel') }}</strong></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                  <th>Time Duration</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody>
                  @foreach ($allClassTimes as $class_time)
                      <tr>
                          <td>{{ $class_time->time_duration }}</td>
                          <td>{{ $class_time->created_user->name }}</td>
                          <td>
                              @if (!empty($class_time->updated_user->name))
                                  {{ $class_time->updated_user->name }}
                              @else
                                Not updated yet!!
                              @endif
                          </td>
                          <td>{{ $class_time->created_at }}</td>
                          <td>{{ $class_time->updated_at }}</td>
                          <td>
                              @if ($class_time->status == 1)
                                  Active
                              @else
                                  Inactive
                              @endif
                          </td>
                          <td><a href="{{ url('/edit/classTime/'.$class_time->id) }}" class="btn btn-primary btn-sm" type="button" ><i class="fas fa-edit"></i></a></td>
                      </tr>
                  @endforeach
              </tbody>
              <tfoot>
              <tr>
                  <th>Time Duration</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->



@endsection



@section('admin_css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/jquery.dataTables.min.css')}}">

@endsection


@section('admin_scripts')

    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });


  });

</script>

@endsection
