@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Create New Quiz</h1>
                    </div>
                    <div class="card-body border p-4 rounded">
                        <form action="{{ route('quizzes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Quiz Description</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="class_id">Select Class</label>
                                <select name="class_id" id="class_id" class="form-control" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Select Subject</label>
                                <select name="subject_id" id="subject_id" class="form-control" required>
                                    <option value="">Select Subject</option>
                                </select>
                                @error('subject_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
                                @error('end_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="duration">Quiz Duration (in minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required>
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div id="questions-container">
                                <div class="form-group">
                                    <label for="question">Question 1</label>
                                    <input type="text" name="questions[0][question_text]" class="form-control" placeholder="Enter question" required value="{{ old('questions.0.question_text') }}">
                                    @error('questions.0.question_text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="questions[0][option1]" class="form-control mt-2" placeholder="Option 1" required value="{{ old('questions.0.option1') }}">
                                    @error('questions.0.option1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="questions[0][option2]" class="form-control mt-2" placeholder="Option 2" required value="{{ old('questions.0.option2') }}">
                                    @error('questions.0.option2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="questions[0][option3]" class="form-control mt-2" placeholder="Option 3" required value="{{ old('questions.0.option3') }}">
                                    @error('questions.0.option3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="questions[0][option4]" class="form-control mt-2" placeholder="Option 4" required value="{{ old('questions.0.option4') }}">
                                    @error('questions.0.option4')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="questions[0][correct_option]" class="form-control mt-2" placeholder="Correct Answer (e.g., option1)" required value="{{ old('questions.0.correct_option') }}">
                                    @error('questions.0.correct_option')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3" id="add-question">Add Another Question</button>
                            <button type="submit" class="btn btn-success mt-3">Create Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

<script>
    let questionCount = 1;
    document.getElementById('add-question').addEventListener('click', function () {
        const container = document.getElementById('questions-container');
        const newQuestion = `
            <div class="form-group mt-4">
                <label for="question">Question ${questionCount + 1}</label>
                <input type="text" name="questions[${questionCount}][question_text]" class="form-control" placeholder="Enter question" required>
                <input type="text" name="questions[${questionCount}][option1]" class="form-control mt-2" placeholder="Option 1" required>
                <input type="text" name="questions[${questionCount}][option2]" class="form-control mt-2" placeholder="Option 2" required>
                <input type="text" name="questions[${questionCount}][option3]" class="form-control mt-2" placeholder="Option 3" required>
                <input type="text" name="questions[${questionCount}][option4]" class="form-control mt-2" placeholder="Option 4" required>
                <input type="text" name="questions[${questionCount}][correct_option]" class="form-control mt-2" placeholder="Correct Answer (e.g., option1)" required>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newQuestion);
        questionCount++;
    });
</script>
<script>
    document.getElementById('class_id').addEventListener('change', function() {
    const classId = this.value;
    
    // Fetch subjects based on the selected class
    fetch(`/teacher/get-subjects/${classId}`)
        .then(response => response.json())
        .then(data => {
            const subjectSelect = document.getElementById('subject_id');
            subjectSelect.innerHTML = '<option value="">Select Subject</option>'; // Reset the dropdown

            // Populate the subjects dropdown
            data.forEach(subject => {
                const option = document.createElement('option');
                option.value = subject.id;
                option.textContent = subject.name;
                subjectSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching subjects:', error));
});

    </script>
    
@endsection

