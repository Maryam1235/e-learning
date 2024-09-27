@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">

<a href="{{ route('student.assignments')}}" class="btn btn-primary link">Go Back</a>
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
            <form action="{{ route('student.assignments.submit', $assignment->id) }}" id="submission_form" method="POST" enctype="multipart/form-data">
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

<script>
    $(document).ready(function() {
    $('#submission_form').submit(function(event) {
        event.preventDefault();
        console.log('Form submission prevented');
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log('AJAX submission successful');
                console.log(data);
                $('#submission_form').append('<div class="alert alert-success">Assignment submitted successfully!</div>');
            },
            error: function(xhr, status, error) {
                console.log('AJAX submission error');
                console.log(xhr.responseText);
                $('#submission_form').append('<div class="alert alert-danger">Error uploading assignment. Please try again.</div>');
            }
        });
    });
});
</script>
@endsection
