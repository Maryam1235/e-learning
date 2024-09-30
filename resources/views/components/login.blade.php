{{-- <x-layout />
@include('partials.header')
    <div class="background">

    </div>
   <div id='log'>
        <p >
           <b> WELCOME TO SUMAJKT eLEARNING MANAGEMENT SYSTEM </b>
        </p>
   
     <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
        @csrf
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
            
            
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
            <input type="submit" value="Login">
        </form>
    
        <p>Don't have an account?</p>
        <a href="{{ route('regForm') }}">Register here</a>
        
    </div>  --}}

    <x-layout />
@include('partials.header')

<div id="log">
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
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

                 <span class="toggle-password" onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </span>

            </div>
            
            <input type="checkbox" id="remember">
            <label for="remember">Remember Me</label><br>
            
            <input type="submit" value="Login">
        </form>
        
        <p>Don't have an account?</p>
        <a href="{{ route('regForm') }}">Register here</a>
    </div>
</div>
<script>
    function togglePassword(fieldId, iconId) {
        var passwordInput = document.getElementById(fieldId);
        var eyeIcon = document.getElementById(iconId);
        
        // Toggle between 'password' and 'text'
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash'); // Change icon to 'eye-slash' when showing the password
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye'); // Revert back to 'eye' when hiding the password
        }
    }
</script>



                

