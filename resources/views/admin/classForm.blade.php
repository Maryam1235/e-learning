{{-- @extends('components.dashmaster') --}}
<x-layout />
@include('partials.header')
<div class="background"></div>
<div class="padding-c">  
    <div class="form-container">
    <h2>Add Class</h2>
    <form method="POST" action="{{route ('storeClass')}}">
        @csrf
        <input type="text" name="name" placeholder="Class Name" required><br>

        <input type="submit" value="Add">
    </form>
</div>
</div>