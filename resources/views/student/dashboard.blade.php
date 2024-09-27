
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
@endsection
