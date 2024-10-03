@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-dashboard">

@foreach($submissions as $submission)
    <h2>Assignment ID: {{ $submission->assignment_id }}</h2>
    <p>Submitted At: {{ $submission->submitted_at }}</p>
    <a href="{{ Storage::url($submission->file_path) }}">Download Submission</a>
@endforeach

</div>
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection
