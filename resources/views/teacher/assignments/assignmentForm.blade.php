@extends('components.dashmaster')


@section('body')
<div class="content-wrapper">

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
        </div>
        {{-- <br> --}}
        <div>
            <select id="class_id" name="class_id" class="form-control " required>
                <option value="" disabled selected>Select a Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <select id="subject_id" name="subject_id" class="form-control " required>
                <option value="" disabled selected>Select a Subject</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="Description"></textarea><br>
        </div>
        <br>
        <div>
            <input type="file" name="file" accept=".pdf,.doc,.docx" required><br>
        </div>
        <br>
        <div>
            <input type="datetime-local" name="submission_deadline" required><br>
        </div>
<br><br>
        <input type="submit" value="Create Assignment">



    </form>
</div>
</div>
</div>
@endsection



