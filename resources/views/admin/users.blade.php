
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
                    {{-- status --}}
                    <th>Status</th>
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
                      {{-- status --}}
                     <td>
                        @if ($user->status == 'active')
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-secondary">Inactive</span>
                        @endif
                      </td>
                    <td>
                      <a href="/viewUser/{{$user->id}}" role="button" class="btn btn-info btn-sm" ><i class="text-success fa fa-eye"></i></a>
                      <a href="/editUser/{{$user->id}}" role="button" class="btn btn-warning btn-sm"><i class="text-primary fa fa-edit"></i></a>
    
                      <form action="/deleteUser/{{$user->id}}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger btn-sm">
                              <i class="text-danger fa fa-trash" > 
                              <span class="d-none d-md-inline-block"> </span></i>
                          </button>
                        </form>


                         <!-- Toggle Activation/Deactivation -->
                        <form action="{{ route('admin.users.updateStatus', $user->id) }}" method="POST" style="display:inline;">
                         
                              @csrf
                              <input type="hidden" name="_method" value="PATCH"> <!-- Hidden field for PATCH -->
                              
                              @if($user->status == 'inactive')
                                  <button type="submit" name="status" value="active" class="btn btn-success btn-sm" onclick="return confirm('Activate this user?')">
                                      Activate
                                  </button>
                              @else
                                  <button type="submit" name="status" value="inactive" class="btn btn-danger btn-sm" onclick="return confirm('Deactivate this user?')">
                                      Deactivate
                                  </button>
                              @endif
                        </form>

                        {{-- <td> --}}
                            <!-- Other action buttons -->
                            <a href="{{ route('admin.resetPassword', $user->id) }}" class="btn btn-warning btn-sm">Reset Password</a>
                        {{-- </td> --}}

                     
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