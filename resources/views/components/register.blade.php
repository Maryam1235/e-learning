{{-- <x-layout />
@include('partials.header')
<div class="background">
</div>
<div id="log">
      <p >
           <b> WELCOME TO SUMAJKT eLEARNING MANAGEMENT SYSTEM </b>
      </p>
    <div class="form-container">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
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
                <option value="other">Other</option>
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
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
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
    
</script> --}}


<x-layout />
@include('partials.header')

<div class="background"></div>

<div id="log">
    <p><b>WELCOME TO SUMAJKT eLEARNING MANAGEMENT SYSTEM</b></p>

    <div class="form-container">
        <h2>Register</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="toggle-password" onclick="togglePassword('password', 'eyePassword')" style="cursor: pointer;">
                    <i class="fa fa-eye" id="eyePassword"></i>
                </span>
            </div>
            <div>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="toggle-password" onclick="togglePassword('password_confirmation', 'eyeConfirmPassword')" style="cursor: pointer;">
                    <i class="fa fa-eye" id="eyeConfirmPassword"></i>
                </span>
            </div>
            <div>
                <select name="gender" required>
                    <option value="" selected disabled>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <select name="school" required>
                    <option value="" selected disabled>Select School</option>
                    <option value="jitegemee">Jitegemee</option>
                    <option value="kawawa">Kawawa</option>
                </select>
                @error('school')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <select id="role" name="role" required>
                    <option value="" selected disabled>Select Role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
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
                </select>
                @error('class_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</div>

<script>
    function togglePassword(fieldId, iconId) {
        var passwordInput = document.getElementById(fieldId);
        var eyeIcon = document.getElementById(iconId);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye'); 
        }
    }

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




