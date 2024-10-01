{{-- @extends('components.dashmaster')

@section('body')
  <div class="content-wrapper custom-dashboard">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assigned Subjects</h1>
          </div>
        </div> 
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="subject" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $subject)
                  <tr>
                    <td>
                      <a href="{{ route('teacher.subjects', ['class' => $school_class->id, 'subject' => $subject->id]) }}" class="btn btn-secondary">{{ $subject->name }} Materials </a>
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


<script>
  $(function () {
    $("#subject").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#subject_wrapper .col-md-6:eq(0)');
 
  });
</script>
@endsection



 --}}

 @extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Assigned Subjects for {{ $school_class->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="subject" class="table table-bordered table-striped">
<<<<<<< Updated upstream
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($subjects as $subject)
                                      <tr>
                                          <td>
                                              <a href="{{ route('teacher.subjects', ['class' => $school_class->id, 'subject' => $subject->id]) }}" class="btn btn-secondary">{{ $subject->name }} Materials </a>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
=======
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>
                                                <a href="{{ route('teacher.subjects', ['class' => $school_class->id, 'subject' => $subject->id]) }}" class="btn btn-secondary">{{ $subject->name }} Materials </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        $("#subject").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#subject_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
