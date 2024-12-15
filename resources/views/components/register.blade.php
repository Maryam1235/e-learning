<x-layout />
@include('partials.header')

<div class="background"></div>

<div id="log" style="padding-top:150px;">
    <div class="form-container">
        <h2>Register</h2>
        
        <form method="POST" action="{{ route('register') }}" class="three-column-form">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Name" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword('password', 'eyePassword')" style="cursor: pointer;">
                        <i class="fa fa-eye" id="eyePassword"></i>
                    </span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <div class="password-container">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePassword('password_confirmation', 'eyeConfirmPassword')" style="cursor: pointer;">
                        <i class="fa fa-eye" id="eyeConfirmPassword"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
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
            <div class="form-group">
                <label for="school">School:</label>
                <select name="school" required>
                    <option value="" selected disabled>Select School</option>
                    <option value="jitegemee">Jitegemee</option>
                    <option value="kawawa">Kawawa</option>
                </select>
                @error('school')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="" selected disabled>Select Role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group" id="class-container" style="display:none;">
                <label for="class_id">Class:</label>
                <select id="class_id" name="class_id">
                    <option value="" selected disabled>Select Class</option>
                    @foreach($school_classes as $school_class)
                        <option value="{{ $school_class->id }}">{{ $school_class->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group form-submit">
                <input type="submit" value="Register" class="btn-submit">
            </div>
        </form>
    </div>
</div>

<style>
    /* Form Styling */
    .three-column-form {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px; /* Space between fields */
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    .form-group input,
    .form-group select {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
    }

    .password-container {
        display: flex;
        align-items: center;
    }

    .password-container input {
        flex: 1;
    }

    .toggle-password {
        margin-left: 10px;
    }

    /* Submit Button Styling */
    .form-submit {
        grid-column: span 3; /* Makes the submit button span across all three columns */
        text-align: center;
    }

    .btn-submit {
        padding: 12px 30px;
        font-size: 18px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    /* General Styling */
    .background {
        background-color: #f9f9f9;
        min-height: 100vh;
    }

    .form-container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
</style>

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
        const classContainer = document.getElementById('class-container');
        if (this.value === 'student') {
            classContainer.style.display = 'block';
        } else {
            classContainer.style.display = 'none';
        }
    });
</script>
