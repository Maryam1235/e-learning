
@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-student">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student Dashboard</h1>
     
    </div>


   
    
    <section class="containter-fluid my-5">

            <div class="welcome-message">
                <h1>Welcome, {{ $student->name }}!</h1>
                <p>We're glad to have you back.</p>
                <h2>Your Class: {{ $student->schoolClass->name }}</h2>
            </div>

        
    </section>
</div>

<footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

<script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
</script>
@endsection
