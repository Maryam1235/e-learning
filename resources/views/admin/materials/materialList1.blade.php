@extends('components.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subject: {{ $subject->name }}</h1>
        <div>
      <a href="{{route('adminMaterials.upload',['class' => $class->id, 'subject' => $subject->id])}}">  <button style="
    background-color: #007bff; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    border-radius: 5px; 
    font-size: 16px; 
    cursor: pointer; 
    transition: background-color 0.3s ease, transform 0.2s ease;" 
    onmouseover="this.style.backgroundColor='#0056b3'; this.style.transform='scale(1.05)';" 
    onmouseout="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';" 
    onmousedown="this.style.backgroundColor='#004085';" 
    onmouseup="this.style.backgroundColor='#0056b3';">
    <i class="fa fa-plus"> </i> Add Material
</button></a>

        </div>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Uploaded Materials</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Link/File</th>
                                    </tr>
                                </thead>
   

                                <tbody>
                                    @forelse($materials as $material)
                                        <tr>
                                            <td>{{ $material->title }}</td>
                                            <td>{{ ucfirst($material->type) }}</td>
                                            <td>
                                                {{-- @if($material->type === 'link')
                                                    <a href="{{ $material->url }}" target="_blank">{{ $material->url }}</a>
                                                @else
                                                    <a href="{{ Storage::url($material->path) }}" target="_blank">Download/View</a>
                                                @endif --}}

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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection