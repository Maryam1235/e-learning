@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Quiz</h1>
                    </div>
                    <div class="card-body border p-4 rounded">
                        <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Quiz Title -->
                            <div class="form-group">
                                <label for="title">Quiz Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $quiz->title) }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Quiz Description -->
                            <div class="form-group">
                                <label for="description">Quiz Description</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $quiz->description) }}" required>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Select Class -->
                            <div class="form-group">
                                <label for="class_id">Select Class</label>
                                <select name="class_id" id="class_id" class="form-control" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id', $quiz->class_id) == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Select Subject -->
                            <div class="form-group">
                                <label for="subject_id">Select Subject</label>
                                <select name="subject_id" id="subject_id" class="form-control" required>
                                    <option value="">Select a subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id', $quiz->subject_id) == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Start Time -->
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', $quiz->start_time->format('Y-m-d\TH:i')) }}" required>
                                @error('start_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- End Time -->
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', $quiz->end_time->format('Y-m-d\TH:i')) }}" required>
                                @error('end_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Duration -->
                            <div class="form-group">
                                <label for="duration">Quiz Duration (in minutes)</label>
                                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $quiz->duration) }}" required>
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Questions Section -->
                            <div id="questions-container">
                                @foreach($quiz->questions as $index => $question)
                                    <div class="form-group">
                                        <label for="question">Question {{ $index + 1 }}</label>
                                        <input type="text" name="questions[{{ $index }}][question_text]" class="form-control" value="{{ old('questions.' . $index . '.question_text', $question->question_text) }}" required>
                                        @error("questions.{$index}.question_text")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <input type="text" name="questions[{{ $index }}][option1]" class="form-control mt-2" value="{{ old('questions.' . $index . '.option1', $question->option1) }}" placeholder="Option 1" required>
                                        <input type="text" name="questions[{{ $index }}][option2]" class="form-control mt-2" value="{{ old('questions.' . $index . '.option2', $question->option2) }}" placeholder="Option 2" required>
                                        <input type="text" name="questions[{{ $index }}][option3]" class="form-control mt-2" value="{{ old('questions.' . $index . '.option3', $question->option3) }}" placeholder="Option 3" required>
                                        <input type="text" name="questions[{{ $index }}][option4]" class="form-control mt-2" value="{{ old('questions.' . $index . '.option4', $question->option4) }}" placeholder="Option 4" required>

                                        <input type="text" name="questions[{{ $index }}][correct_option]" class="form-control mt-2" value="{{ old('questions.' . $index . '.correct_option', $question->correct_option) }}" placeholder="Correct Answer (e.g., option1)" required>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Add another question button -->
                            <button type="button" class="btn btn-primary mt-3" id="add-question">Add Another Question</button>

                            <!-- Submit Quiz -->
                            <button type="submit" class="btn btn-success mt-3">Update Quiz</button>
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


<!-- JavaScript to dynamically add more questions -->
<script>
    let questionCount = {{ $quiz->questions->count() }};
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

        fetch(`/subjects/${classId}`)
            .then(response => response.json())
            .then(data => {
                const subjectSelect = document.getElementById('subject_id');
                subjectSelect.innerHTML = '<option value="">Select a subject</option>'; // Reset the dropdown
    
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
