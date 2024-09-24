@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assignments Management</h1>
          </div>
          <div class="col-sm-6 ">
           <a href="/addAssignment"> <i class="fa fa-plus"> </i>Add Assignment</a>
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
                    <th>Title</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($assignments as $assignment)
                  <tr>
                    <td><strong>{{ $assignment->title }}</strong></td>
                    <td><a href="{{ route('assignment.show', $assignment->id) }}">View Details</a></td>
                    <td> <a href="#" onclick="event.preventDefault(); document.getElementById('deleteUser-form--{{$assignment-> id}}').submit();">
                        <i class="text-danger fa fa-trash" > 
                        <span class="d-none d-md-inline-block"> </span></i>
                    </a>
                      <form id="deleteUser-form--{{$assignment-> id}}" action="/deleteAssignment/{{$assignment->id}}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                      </form>
                    </td>>
                  </tr>
                  @endforeach
                </tbody>

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



