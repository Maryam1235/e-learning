@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-dashboard">

@foreach($submissions as $submission)
    <h2>Assignment ID: {{ $submission->assignment_id }}</h2>
    <p>Submitted At: {{ $submission->submitted_at }}</p>
    <a href="{{ Storage::url($submission->file_path) }}">Download Submission</a>
@endforeach

</div>
@endsection
