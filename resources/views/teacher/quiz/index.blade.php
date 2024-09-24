{{-- @extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper back">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quizzes Management</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ route('quizzes.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Quiz</a>
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
              <h2 class="card-header">Quiz List</h2>
              <div class="card-body">
                @if($quizzes->isEmpty())
                  <p>No quizzes available. <a href="{{ route('quizzes.create') }}">Create a new quiz</a></p>
                @else
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration (minutes)</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($quizzes as $quiz)
                        <tr>
                          <td>{{ $quiz->title }}</td>
                          <td>{{ $quiz->description }}</td>
                          <td>{{ $quiz->class->name ?? 'N/A' }}</td> <!-- Displaying Class name -->
                          <td>{{ $quiz->subject->name ?? 'N/A' }}</td> <!-- Displaying Subject name -->
                          <td>{{ $quiz->start_time->format('d M, Y H:i') }}</td>
                          <td>{{ $quiz->end_time->format('d M, Y H:i') }}</td>
                          <td>{{ $quiz->duration }} minutes</td>
                          <td>
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
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
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
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

@endsection --}}
@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper back">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quizzes Management</h1>
          </div>
          <div class="col-sm-6 text-right">
            <a href="{{ route('quizzes.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Quiz</a>
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
              <h2 class="card-header">Quiz List</h2>
              <div class="card-body">
                @if($quizzes->isEmpty())
                  <p>No quizzes available.
                @else
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Class</th>
                        <th>Subject</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration (minutes)</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($quizzes as $quiz)
                        <tr>
                          <td>{{ $quiz->title }}</td>
                          <td>{{ $quiz->description }}</td>
                          <td>{{ $quiz->class->name ?? 'N/A' }}</td> 
                          <td>{{ $quiz->subject->name ?? 'N/A' }}</td>
                          <td>{{ $quiz->start_time->format('d M, Y H:i') }}</td>
                          <td>{{ $quiz->end_time->format('d M, Y H:i') }}</td>
                          <td>{{ $quiz->duration }} minutes</td>
                          <td>
                            <a href="{{ route('quizzes.show', $quiz->id) }}" role="button" class="btn btn-info btn-sm" ><i class="text-success fa fa-eye"></i></a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" role="button" class="btn btn-warning btn-sm"><i class="text-primary fa fa-edit"></i></a>
                            {{-- <a href="#" onclick="event.preventDefault(); document.getElementById('deleteUser-form--{{$quiz->id}}').submit();" class="btn btn-danger btn-sm">
                                <i class="text-danger fa fa-trash" > 
                                <span class="d-none d-md-inline-block"> </span></i>
                            </a> --}}
                            
                            {{-- <form id="deleteUser-form--{{$quiz->id}}" action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                            </form> --}}

                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                    <i class="text-danger fa fa-trash" > 
                                    <span class="d-none d-md-inline-block"> </span></i>
                                </button>
                              </form>
                           
                          </td>
                          {{-- <td>
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                          </td> --}}
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
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
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
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
