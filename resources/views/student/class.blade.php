@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-student">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects Registered for {{$student->name}}</h1>

    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h3 class="card-header bg-light">{{$student->schoolClass->name}} subjects List</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>     
                                <div class="container">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($student->schoolClass)
                                        @if($subjects->isEmpty())
                                            <p>No subjects have been assigned to your class yet.</p>
                                        @else
                                            @foreach($subjects as $subject)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('student.subject.materials', $subject->id) }}">{{ $subject->name }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @else
                                        <p>You are not enrolled in any class. Please contact the administration.</p>
                                    @endif
                                </tbody>

                                </table>
                                
                                </div>
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





