@extends('components.dashmaster')

@section('body')
<div class="container">
    <h1>Session Details</h1>

    <p>Session Code: <strong>{{ $session->session_code }}</strong></p>
    <p>Zoom Link: <a href="{{ $session->meeting_link }}" target="_blank">{{ $session->meeting_link }}</a></p>
    <p>Teacher: {{ $session->teacher->name }}</p>
</div>
@endsection