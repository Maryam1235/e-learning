@extends('components.dashmaster')

@section('body')
<div class="container">
    <h1>Session Details</h1>

    <p>Session Code: <strong>{{ $session->session_code }}</strong></p>
    <p>Zoom Link: <a href="{{ $session->meeting_link }}" target="_blank">{{ $session->meeting_link }}</a></p>
    <p>Teacher: {{ $session->teacher->name }}</p>
</div>
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection