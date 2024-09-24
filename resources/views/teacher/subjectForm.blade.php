@extends('components.dashmaster')

<div class="background"></div>
<div class="padding">  
    <div class="form-container">
    <h2>Add Subject</h2>
    <form method="POST" action="{{route ('teacher.storeSubject', $school_class->id)}}">
        @csrf
        <input type="text" name="name" placeholder="Subject Name" required><br>
        <input type="hidden" name="school_class_id" value="{{ $school_class->id }}">
        <input type="submit" value="Add">
    </form>
</div>
</div>