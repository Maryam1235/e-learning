
@extends('components.dashmaster')


@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Management</h1>
          </div>
          <div class="col-sm-6 ">
           <a href="/addUser"> <i class="fa fa-plus"> </i> New User</a>
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
                    <th>Email</th>
                    <th>School</th>
                    <th>Class</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->school }}</td>
                    <td>{{ optional($user->schoolClass)->name ?? 'No class assigned' }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                      <a href="/viewUser/{{$user->id}}" role="button" class="ml-1 editPack"><i class="text-success fa fa-eye"></i></a>
                      <a href="/editUser/{{$user->id}}" role="button" class="ml-1 editPack"><i class="text-primary fa fa-edit"></i></a>
                      <a href="#" onclick="event.preventDefault(); document.getElementById('deleteUser-form--{{$user-> id}}').submit();">
                          <i class="text-danger fa fa-trash" > 
                          <span class="d-none d-md-inline-block"> </span></i>
                      </a>
                      <form id="deleteUser-form--{{$user-> id}}" action="/deleteUser/{{$user->id}}" method="POST" style="display: none;">
                          @csrf
                          @method('DELETE')
                      </form>
                    </td>
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

  });
</script>

@endsection