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
                                        <th scope="col">View</th>   
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
                                                <td><a href="{{ route('student.material.open', $material->id) }}">View</a></td>
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
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection
