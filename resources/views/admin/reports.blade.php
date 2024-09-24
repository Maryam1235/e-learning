@extends('components.dashmaster')
@include('components.nav')
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reports</h1>
          </div>
          <div class="col-sm-6 ">
           {{-- <a href="{{ route('subjectForm', $school_class->id) }}"> <i class="fa fa-plus"> </i> New Subject</a> --}}
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <h4 class="text-black-50">Register data</h4>
              <div class="card-body">
                <a href="{{route('admin.user.reports')}}" class="btn btn-primary">User report</a>
                <a href="{{route('admin.class.reports')}}" class="btn btn-primary">Class report</a>
              </div>
              <!-- /.card-body -->  
            </div>
            <!-- /.card -->
            <div class="card">
                <h4 class="text-black-50">Students Performance Report</h4>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">Assesments Results report</a>
                    <a href="#" class="btn btn-primary">Assignment Submission Report</a>
                </div>
                <!-- /.card-body --> </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- ./wrapper -->


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
