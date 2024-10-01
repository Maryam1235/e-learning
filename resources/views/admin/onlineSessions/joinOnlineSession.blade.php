@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-student">
<div class="container">
<div class="col-12">
    <div class="welcome-message bg-light p-4 rounded">
        <h2>Join a Meeting</h2> <br> <br>
        <form action="{{ route('admin.joinMeeting') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="meeting_code">Enter Meeting Code</label><br><br>
                <input type="text" name="meeting_code" class="form-control" required><br><br>
            </div>
            <button type="submit" class="btn btn-primary">Join Meeting</button>
        </form>

    </div>
</div>
</div> 
@endsection