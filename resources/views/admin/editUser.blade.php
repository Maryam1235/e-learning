@extends('components.dashmaster')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">

<body class="bg-theme">
    
    <div class="container ">
        <div class="row px-auto mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow p-3 mt-5 mx-auto text-dark">

                    <h2 class="title my-4">{{$user->name}}</h2>
                    <form action="/editedUser/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input form-group mb-3">
                            <label for="room_name">User Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                        <div class="input form-group mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control" required>
                        </div>

                        
                        <div class="input form-group mb-3">
                            <label for="status">Role</label>
                            <input type="text" name="role" id="role" value="{{$user->role}}" class="form-control" required>
                        </div>
                        
                       
                         
                            <button type="submit" class="btn btn-success btn-primary mt-3 text-center px-3" id="add-question">
                                Save Changes
                            </button>
                            <button type="button" class="btn btn-primary mt-3 text-center px-3" onclick="window.location.href='{{ route('admin.users') }}'">
                                Go Back
                            </button>
                           
                      </div> 
                    </form>
                 
                </div>
            </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="/assets/js/app.js"></script>

@endsection
