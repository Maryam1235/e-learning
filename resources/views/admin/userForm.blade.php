{{-- @extends('components.dashmaster') --}}
 <x-layout />
@include('partials.header')
<div class="background">
</div>
<div id="log">
    <p >
           <b> WELCOME TO SUMAJKT eLEARNING MANAGEMENT SYSTEM </b>
    </p>
    <div class="form-container">
        <h2>Register a new User</h2>
        <form method="POST" action="{{route ('admin.addUser')}}">
           
            @csrf
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
            
            <select name="school" required>
                <option value="" selected disabled>Select School</option>
                <option value="jitegemee">Jitegemee</option>
                <option value="kawawa">Kawawa</option>
            </select><br>

            <select id="role" name="role" required>
                <option value="" selected disabled>Select Role</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select><br>

            <select id="class_id" name="class_id" style="display:none;">
                <option value="" selected disabled>Select Class</option>
                @foreach($school_classes as $school_class)
                <option value="{{ $school_class->id }}">{{ $school_class->name }}</option>
                @endforeach
            </select><br>

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
    
</script>