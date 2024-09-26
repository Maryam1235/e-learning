@extends('components.dashmaster')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $quiz->title }}</h1>
                        <p>{{ $quiz->description }}</p>
                        <div id="timer" class="text-danger h4">Time Left: 00:00</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quizzes.submit', $quiz->id) }}" method="POST">
                            @csrf
                            @foreach ($questions as $index => $question)
                                <div class="form-group">
                                    <label>{{ $index + 1 }}. {{ $question->question_text }}</label>
                                    <div>
                                        <label><input type="radio" name="answers[{{ $question->id }}]" value="option1" required> {{ $question->option1 }}</label><br>
                                        <label><input type="radio" name="answers[{{ $question->id }}]" value="option2"> {{ $question->option2 }}</label><br>
                                        <label><input type="radio" name="answers[{{ $question->id }}]" value="option3"> {{ $question->option3 }}</label><br>
                                        <label><input type="radio" name="answers[{{ $question->id }}]" value="option4"> {{ $question->option4 }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-success">Submit Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Countdown Timer Script -->
<script>
    // Define the quiz duration in minutes (assuming this is passed from the backend)
    var duration = {{ $quiz->duration }} * 60; // Convert minutes to seconds
    var timer = document.getElementById('timer');

    function startCountdown() {
        var interval = setInterval(function () {
            var minutes = Math.floor(duration / 60);
            var seconds = duration % 60;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            // Display the time left
            timer.innerHTML = 'Time Left: ' + minutes + ':' + seconds;

            // Stop the timer when duration reaches 0
            if (duration <= 0) {
                clearInterval(interval);
                alert('Time is up! The quiz will be submitted automatically.');
                document.querySelector('form').submit(); // Automatically submit the form
            }

            duration--;
        }, 1000);
    }

    // Start the countdown when the page loads
    window.onload = startCountdown;
</script>
@endsection
