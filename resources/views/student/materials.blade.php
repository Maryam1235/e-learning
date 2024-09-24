@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        {{-- <h1 class="h2">Subjects Registered for {{$student->name}}</h1> --}}

    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h1 class="card-header bg-light">{{ $subject->name }} - Materials</h1>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <div class="container">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Download</th>  
                                    </tr>
                                   
                                </thead>
                                <tbody>
                                    @if($materials->isEmpty())
                                    <p>No materials have been uploaded for this subject yet.</p>
                                @else
                                        @foreach($materials as $material)
                                            <tr>
                                                <td>
                                                    {{ $material->title }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('student.materials.download', $material->id) }}">Download</a>
                                                </td>
                                            </tr>   
                                        @endforeach
                                @endif
                                
                                <a href="{{ route('student.class') }}" class="btn btn-primary">Back to Subjects</a>
                                    
                                </div>
                                </tbody>
                            </table>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
