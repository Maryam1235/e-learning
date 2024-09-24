@extends('components.dashmaster')
<div class="background"></div>
<div class="padding-c" >
{{-- <main>   --}}
    <div class="form-container">
    <h2>Add Class</h2>
    <form method="POST" action="{{route ('teacherStoreClass')}}">
        @csrf
        <input type="text" name="name" placeholder="Class Name" required><br>

        <input type="submit" value="Add">
    </form>
</div>
   {{-- </main> --}}
</div>