@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

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
                    <h2>Role :</h2>
                    <h4>{{$user->role}}</h4>
                </div>
                <div class="row">
                    <h2>Gender :</h2>
                    <h4>{{$user->gender}}</h4>
                </div>
                 <div class="row">
                    <h2>School :</h2>
                    <h4>{{$user->school}}</h4>
                </div>
                    <!-- Display assigned classes and subjects -->


                <div class="row">
                    <h2>Assigned Classes and Subjects</h2>

                    <ul>
                        @foreach($assignedClasses as $className => $subjects)
                            <li>{{ $className }}:
                                <ul>
                                    @foreach($subjects as $subject)
                                        <li>{{ $subject->subject_name }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
    
              <div >

                </div>
                
                <div >
                <button type="submit" class="btn btn-success btn-primary mt-3 text-center px-3" onclick="window.location.href='/editUser/{{$user->id}}' ">
                    Edit User 
                </button>
                <button type="button" class="btn btn-primary mt-3 text-center px-3" onclick="window.location.href='{{ route('admin.users') }}'">
                    Go Back
                </button>
                </div> 


                 
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection