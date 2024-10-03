@extends('components.dashmaster')

@section('body')
  <div class="content-wrapper custom-dashboard">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
     <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

    <div class="container">
        <div class="row px-auto mt-5">
            <div class="card shadow p-3 mt-5 mx-auto text-dark">
                <h3 class="title my-4 pb-2 border-bottom">{{$user->name}}</h3>

                <div class="row">
                    <h2>Email :</h2>
                    <h4>{{$user->email}}</h4>
                </div>
                <hr>
                 <div class="row">
                    <h2>Gender :</h2>
                    <h4>{{$user->gender}}</h4>
                </div>
                <hr>
                <div class="row">
                    <h2>Role :</h2>
                    <h4>{{$user->role}}</h4>
                </div>
                   


                 
                
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection