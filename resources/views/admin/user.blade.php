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
                {{-- <div class="row">
                    <h2>Assigned Classes and Subjects:</h2>
                    @if($user->classes->isNotEmpty())
                        <ul>
                            @foreach($user->classes as $class)
                                <li>
                                    {{ $class->name }} - 
                                    @foreach($class->subjects as $subject)
                                        {{ $subject->name }}
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No classes assigned yet.</p>
                    @endif
                </div> --}}
                <!-- Display assigned classes and subjects -->
<!-- Display assigned classes and subjects -->
<div class="row">
    <h2>Assigned Classes and Subjects:</h2>
    @if($user->classes->isNotEmpty())
        <ul>
            @foreach($user->classes->groupBy('id') as $classId => $groupedClass)
                @php
                    // Get the first class instance from the grouped classes
                    $class = $groupedClass->first();
                @endphp

                <li>
                    <strong>{{ $class->name }}:</strong>
                    <ul>
                        @foreach($class->subjects->unique('id') as $subject)
                            <li>{{ $subject->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <p>No classes assigned yet.</p>
    @endif
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