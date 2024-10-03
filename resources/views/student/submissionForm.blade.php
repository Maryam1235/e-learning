@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">

    <a href="{{ route('student.assignments') }}" class="btn btn-primary link">Go Back</a>
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
                    <input type="submit" value="Submit Assignment">  
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
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection
