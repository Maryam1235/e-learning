@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <div class="container">
        <h2>{{ $quiz->title }}</h2>
        <p><strong>Description:</strong> {{ $quiz->description }}</p>
        <p><strong>Class:</strong> {{ $quiz->class->name }}</p>
        <p><strong>Subject:</strong> {{ $quiz->subject->name }}</p>
        <p><strong>Start Time:</strong> {{ $quiz->start_time }}</p>
        <p><strong>End Time:</strong> {{ $quiz->end_time }}</p>
        <p><strong>Duration:</strong> {{ $quiz->duration }} minutes</p>

        <h3>Questions</h3>

        @if($quiz->questions->count() > 0)
            @foreach($quiz->questions as $index => $question)
                <div class="card mt-4">
                    <div class="card-body">
                        <h5>Question {{ $index + 1 }}: {{ $question->question_text }}</h5>

                        <ul>
                            <li><strong>Option 1:</strong> {{ $question->option1 }}</li>
                            <li><strong>Option 2:</strong> {{ $question->option2 }}</li>
                            <li><strong>Option 3:</strong> {{ $question->option3 }}</li>
                            <li><strong>Option 4:</strong> {{ $question->option4 }}</li>
                        </ul>

                        <p><strong>Correct Answer:</strong> {{ ucfirst($question->{$question->correct_option}) }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No questions added yet.</p>
        @endif

        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary mt-4">Edit Quiz</a> 
        <a href="{{ route('quizzes.index') }}" class="btn btn-primary mt-4">Go Back</a>
        <a href="{{ route('quizzes.results', $quiz->id) }}" class="btn btn-primary mt-4">Quiz Results</a>
    </div>
</div>
@endsection
