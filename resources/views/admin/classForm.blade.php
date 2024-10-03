{{-- @extends('components.dashmaster') --}}
{{-- <x-layout />
@include('partials.header')
<div class="background"></div> --}}
@extends('components.dashmaster')
@section('body')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper custom-dashboard">
    <div class="Apadding-c">  
        <div class="form-container">
        <h2>Add Class</h2>
        <form method="POST" action="{{route ('storeClass')}}">
            @csrf
            <input type="text" name="name" placeholder="Class Name" required><br>

            <input type="submit" value="Add">
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

@endsection
