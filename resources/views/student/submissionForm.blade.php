@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">
<div class="background"></div>
<div class="sub"> 
    <div class="form-container">
        <h1>{{ $assignment->title }}</h1><br><br>
        <p>{{ $assignment->description }}</p><br><br>
        <p>Deadline: {{ $assignment->submission_deadline }}</p><br><br>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($assignment->submission_deadline > now())
            <form action="{{ route('student.assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".pdf,.doc,.docx" required><br><br>
                <input type="submit"  value="Submit Assignment">  
            </form>
        @else
            <p>You are beyond the deadline!</p>
        @endif

    </div>
     <p>
        <b>REVIEW YOUR WORK CAREFULLY BEFORE SUBMITTING.</b>
    </p>
</div>
</div>
@endsection
