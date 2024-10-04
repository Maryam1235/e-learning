
@extends('components.dashmaster')


@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quiz Results</h1>
          </div>
          <div class="col-sm-6 ">
            <a href="/uploadQuizResults"> <i class="fa fa-plus"> </i> Upload Quiz Results</a>
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
                    <th>Student Name</th>
                    {{-- <th>Score</th> --}}
                    <th>Percentage</th>
                    {{-- <th>Actions</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($quizResults as $quizResult)
                  <tr>
                    <td>{{ $quizResult->student->name }}</td>
                    {{-- <td>{{ $quizResult->score }} / {{ $result->total_questions }}</td> --}}
                    <td>{{ $quizResult->percentage }}%</td>
                    {{-- <td>
                        <a href="{{ route('quizzes.student.results', [$quiz->id, $result->student_id]) }}">View Details</a>
                
                    </td> --}}
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

  });
</script>

@endsection