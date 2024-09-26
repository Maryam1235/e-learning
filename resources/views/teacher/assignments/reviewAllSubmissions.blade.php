@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Submissions</h1>
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
                @forelse($assignmentsWithSubmissions as $assignment)
                <h3>{{ $assignment->title }}</h3>
                @if($assignment->submissions->isNotEmpty())
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Submitted At</th>
                    <th>Download Submission</th>
                    <th>View</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($assignment->submissions as $submission)
                    <tr>
                        <td>{{ $submission->student->name }}</td>
                        <td>{{ $submission->submitted_at->format('d-m-Y H:i') }}</td>
                        <td><a href="{{ Storage::url($submission->file_path) }}" target="_blank">Download</a></td>
                        <td><a href="{{ route('submission.show', $submission->id) }}">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    @else
                    <p>No submissions yet for this assignment.</p>
                @endif
                @empty
                <p>No assignments found.</p>
            @endforelse
                    
                    

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





