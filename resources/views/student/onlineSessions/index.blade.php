
@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-student">
<div class="col-12">
        <div class="welcome-message bg-light p-4 rounded">

            <div class="container">
                <h1>Online Classes</h1><br><br>
                
                <h2>Click the button below to join an online tutoring session</h2><br><br>

                <a href="{{route('teacher.createMeeting')}}" class="btn btn-primary">Join an Online Session</a>
                
            
            </div>
        </div>
</div>
</div>
@endsection
