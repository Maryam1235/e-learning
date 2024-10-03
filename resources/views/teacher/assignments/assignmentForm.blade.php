@extends('components.dashmaster')


@section('body')
<div class="content-wrapper custom-dashboard">

<div class="Tsub">
    <p>
         <b>NOTE!</b><br>
        <b>1. SET A REALISTIC DEADLINE.</b>
        <br>
        <b>2. ENSURE THE ASSIGNMENT ALIGN  WITH LEARNING OBJECTIVES.</b>
    </p>
    <div class="form-container">
    <h2>Add Assignment</h2>
    <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="title" placeholder="Title" required><br><br>
             @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
         <div class="form-group">
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
        <br>
        <div class="form-group">
             <select name="subject_id" id="subject_id" class="form-control" required>
                <option value="">Select Subject</option>
            </select>
             @error('subject_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="Description"></textarea><br>
             @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="file" name="file" accept=".pdf,.doc,.docx" required><br>
             @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="datetime-local" name="submission_deadline" required><br>
             @error('submission_deadline')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
<br><br>
        <input type="submit" value="Create Assignment">



    </form>
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
    document.getElementById('class_id').addEventListener('change', function() {
    const classId = this.value;
    
    fetch(`/teacher/get-subjects/${classId}`)
        .then(response => response.json())
        .then(data => {
            const subjectSelect = document.getElementById('subject_id');
            subjectSelect.innerHTML = '<option value="">Select Subject</option>'; 

            
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




