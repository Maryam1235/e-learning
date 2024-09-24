<x-layout />
@extends('components.dashmaster')
@include('components.nav')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="h2">Subject: {{ $subject->name }}</h1>
          </div>
          <div class="col-sm-6 ">
           <a href="{{route('adminMaterials.upload',['class' => $class->id, 'subject' => $subject->id])}}"> <i class="fa fa-plus"> </i> Add Material</a>
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
                <h4 class="card-header bg-light">Uploaded Materials</h4>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Link/File</th>
                    {{-- <th>View</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @forelse($materials as $material)
                  <tr>
                    <td>{{ $material->title }}</td>
                    <td>
                        @if($material->type === 'document')
                        <a href="{{ Storage::url($material->file_path) }}" target="_blank">Download Document</a>
                        @elseif($material->type === 'video')
                            <a href="{{ Storage::url($material->file_path) }}" target="_blank">Download Video</a>
                        @elseif($material->type === 'link')
                            <a href="{{ $material->url }}" target="_blank">Visit Link</a>
                        @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="3">No materials found for this subject.</td>
                  </tr>
                 @endforelse
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
</body>
</html>
