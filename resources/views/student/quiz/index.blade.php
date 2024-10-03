@extends('components.dashmaster')


@section('body')

  <div class="content-wrapper custom-dashboard">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Available Quizzes</h1>
          </div>
        
        </div>
      </div>
    </section>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="studentQuiz" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
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
                    <td>{{ $quiz->start_time->format('d M, Y H:i') }}</td>
                    <td>{{ $quiz->end_time->format('d M, Y H:i') }}</td>
                    <td>{{ $quiz->duration }}</td>
                    <td>
                        <a href="{{ route('quizzes.start', $quiz->id) }}" class="btn btn-success">Start Quiz</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
   <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>



<script>
  $(function () {
    $("#studentQuiz").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#studentQuiz_wrapper .col-md-6:eq(0)');

  });
</script>

@endsection