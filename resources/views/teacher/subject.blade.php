@extends('components.dashmaster')

@section('body')
  <div class="content-wrapper custom-dashboard">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="h2">Subject: {{ $subject->name }}</h1>
          </div>
          <div class="col-sm-6 ">
           <a href="{{route('teacherMaterials.upload',['class' => $class->id, 'subject' => $subject->id])}}"> <i class="fa fa-plus"> </i> Add Material</a>
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
                <h4 class="card-header bg-light">Uploaded Materials</h4>
                <table id="material" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Link/File</th>
                    <th>Action</th>
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
                    <td>
                     {{-- <button  class="btn btn-warning btn-sm"> --}}
                      <a href="{{ route('material.show', $material->id) }}" class="btn btn-info btn-sm">View</a>
                      {{-- </button> --}}
                      <form action="/deleteMaterial/{{$material->id}}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button onclick="return confirm('Are you sure you want to delete this material?')" class="btn btn-danger btn-sm">
                              Delete
                              <span class="d-none d-md-inline-block"> </span></i>
                          </button>
                        </form>
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<script>
  $(function () {
    $("#material").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#material_wrapper .col-md-6:eq(0)');
 
  });
</script>
@endsection
