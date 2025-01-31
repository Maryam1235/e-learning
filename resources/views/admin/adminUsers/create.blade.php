@extends('components.dashmaster')
@section('body')

  <div class="content-wrapper custom-dashboard">
<div id="Alog">
    <div class="form-container">
        <h2>Register a new Admin User</h2>
        <form method="POST" action="{{route ('adminUsers.store')}}">
           
            @csrf
            <div>
            <input type="text" name="name" placeholder="Name" required><br>
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
              <div>
             <input type="email" name="email" placeholder="Email" required><br>
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
              <div>
            <input type="password" name="password" placeholder="Password" required><br>
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
              <div>
           <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
              @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            
           <div>
            <select name="gender" required>
                <option value="" selected disabled>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select><br>
             @error('gender')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div>
            <select name="school" required>
                <option value="" selected disabled>Select School</option>
                <option value="jitegemee">Jitegemee</option>
                <option value="kawawa">Kawawa</option>
            </select><br>
             @error('school')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div>
            <select id="role" name="role" required>
                <option value="" selected disabled>Select Role</option>
                <option value="admin">Admin</option>
            </select><br>
             @error('role')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div>
            <select id="class_id" name="class_id" style="display:none;">
                <option value="" selected disabled>Select Class</option>
                @foreach($school_classes as $school_class)
                <option value="{{ $school_class->id }}">{{ $school_class->name }}</option>
                @endforeach
            </select><br>
             @error('class_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <input type="submit" value="Register">
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


<script>
    document.getElementById('role').addEventListener('change', function () {
        const classSelect = document.getElementById('class_id');
        if (this.value === 'student') {
            classSelect.style.display = 'block';
            classSelect.setAttribute('required', 'required');
        } else {
            classSelect.style.display = 'none';
            classSelect.removeAttribute('required');
        }
    });
    
</script>
@endsection