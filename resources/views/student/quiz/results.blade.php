{{-- @extends('components.dashmaster')

@section('body')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Quiz Results</h1>
                    </div>
                    <div class="card-body">
                        <p>Quiz: {{ $quizResult->quiz->title }}</p>
                        <p>Score: {{ $quizResult->score }} out of {{ $quizResult->total_questions }}</p>
                        <p>Percentage: {{ $quizResult->percentage }}%</p>

                        <a href="{{ route('student.quizzes') }}" class="btn btn-primary">Back to Quizzes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}

@extends('components.dashmaster')

@section('body')

<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Quiz Results</h1>
                    </div>
                    <div class="card-body">
                        <p>Quiz: {{ $quizResult->quiz->title }}</p>
                        <p>Score: {{ $quizResult->score }} out of {{ $quizResult->total_questions }}</p>
                        <p>Percentage: {{ $quizResult->percentage }}%</p>

                        <a href="{{ route('student.quizzes') }}" class="btn btn-primary">Back to Quizzes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

