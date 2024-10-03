@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
<div class="col-12">
    <div class="welcome-message bg-light p-4 rounded">
        <div class="container mt-5">
            <h2>{{ $assignment->title }}</h2>
            <p><strong>Subject:</strong> {{ $assignment->subject->name }}</p>
            <p><strong>Class:</strong> 
                {{ $assignment->schoolClass ? $assignment->schoolClass->name : 'Class not found' }}
            </p>
            <p><strong>Description:</strong> {{ $assignment->description }}</p>
            <p><strong>Deadline:</strong> {{ $assignment->submission_deadline->format('d-m-Y H:i') }}</p>
            <p><strong>Uploaded By:</strong> {{ $assignment->teacher->name }}</p>

            <a href="{{ route('teacher.assignment.open', $assignment->id) }}" class="btn btn-primary">View Assignment</a>
        </div>
        
    </div>
</div>
</div>
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection

