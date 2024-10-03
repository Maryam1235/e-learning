
@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Assignments List</h1>
    </div>

    <section class="container-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Assignments List</h4>
                    <div class="card-body">
                        @if($assignments->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">View Details</th>
                                            <th scope="col">Download</th>
                                            <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($assignments as $assignment)
                                            <tr>
                                                <td><h5>{{ $assignment->title }}</h5></td>
                                                <td><a href="{{route('student.assignment.show', $assignment->id)}}">View Details</a></td>
                                                <td>
                                                    <a href="{{ route('student.assignments.download', $assignment->id) }}">Download</a>
                                                </td>
                                                <td><a href="{{route('student.assignment.form', $assignment->id)}}">Submit</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No assignments available for your class.</p>
                        @endif
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

