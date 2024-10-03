@extends('components.dashmaster')

@section('body')

  <div class="content-wrapper custom-dashboard">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assigned Classes</h1>
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
                <table id="classes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($schoolClasses as $schoolClass)
                  <tr>
                    <td>
                        <a href="/teacher/viewClass/{{$schoolClass->id}}">{{$schoolClass->name}}</a>
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
    $("#classes").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#classes_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection



