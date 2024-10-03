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
 <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>
