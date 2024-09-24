@extends('components.dashmaster')

@section('body')
    <div class="container mt-5">
        <h2>Submissions for Assignment: {{ $assignment->title }}</h2>
        @if($submissions->isNotEmpty())
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Submitted At</th>
                        <th>Download Submission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td>{{ $submission->student->name }}</td>
                            <td>{{ $submission->submitted_at->format('d-m-Y H:i') }}</td>
                            <td><a href="{{ Storage::url($submission->file_path) }}" target="_blank">Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No submissions yet for this assignment.</p>
        @endif
    </div>
@endsection
