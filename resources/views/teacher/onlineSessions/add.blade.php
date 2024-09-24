@extends('components.dashmaster')


@section('body')
<div class="content-wrapper">
<main>
    <div class="form-container">

        <form action="{{ route('online_classes.store') }}" method="POST">
            @csrf
            <div>
                <label for="topic">Topic:</label>
                <input type="text" name="topic" required>
            </div>
            <br>
            <div>
                <label for="description">Description (Optional):</label>
                <textarea name="description"></textarea>
            </div>
            <br>
            <div>
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" name="start_time" required>
            </div>
            <br>
            <div>
                <label for="duration">Duration (minutes):</label>
                <input type="number" name="duration" required>
            </div>
            <br>
            <input type="hidden" name="zoom_meeting_id" id="zoom_meeting_id">

            <br>
            <input type="submit" value="Create Online Class">
        </form>
    
    </div>

</main>
</div>
@endsection