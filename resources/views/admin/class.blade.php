@extends('components.dashmaster')
{{-- @include('components.nav') --}}
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects Management</h1>
          </div>
          <div class="col-sm-6 ">
           <a href="{{ route('subjectForm', $school_class->id) }}"> <i class="fa fa-plus"> </i> New Subject</a>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $subject)
                  <tr>
                    <td>
                      <a href="{{ route('admin.subjects', ['class' => $school_class->id, 'subject' => $subject->id]) }}" class="btn btn-secondary">View {{ $subject->name }} Materials </a>
                    </td>
                    <td>
                       <form action="/deleteSubject/{{$subject->id}}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Are you sure you want to delete this subject?')" class="btn btn-danger btn-sm">
                              <i class="text-danger fa fa-trash" > 
                              <span class="d-none d-md-inline-block"> </span></i>
                          </button>
                        </form>


                    </td>
                  </tr>
                  </tbody>
                  @endforeach

                </table>
              </div>
              <!-- /.card-body -->
            </div>
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

 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

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
@endsection
