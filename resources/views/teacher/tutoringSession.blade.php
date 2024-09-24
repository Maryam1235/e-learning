@extends('components.dashmaster')

@section('body')
<div class="container">
    <h1>Create a Tutoring Session</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tutoring_sessions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="meeting_topic">Meeting Topic</label>
            <input type="text" name="meeting_topic" id="meeting_topic" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate Session Code</button>
    </form>
</div>
@endsection