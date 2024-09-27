@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">
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
            <a href="{{ route('student.assignment.open', $assignment->id) }}" class="btn btn-primary">View Assignment</a>
            <a href="{{ route('student.assignments') }}" class="btn btn-primary">Go back</a>
        </div>
        
    </div>
</div>
</div>
@endsection


