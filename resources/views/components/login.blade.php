<x-layout />
@include('partials.header')
    <div class="background">

    </div>
   <div id='log'>
        <p >
           <b> WELCOME TO SUMAJKT eLEARNING MANAGEMENT SYSTEM </b>
        </p>
   
     <div class="login-container">
        {{-- <div class="login-box" style="padding-top: 5%"> --}}
        <h1>Login as {{ $role }}</h1>
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
        
    </div> 

                {{-- <!-- Horizontal Form -->
                <div class="card card-info"> -
                    <div class="card-header">
                      <h1 class="card-title">Login</h1>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                      <div class="card-body">
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck2">
                              <label class="form-check-label" for="exampleCheck2">Remember me</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">Sign in</button>
                        <button type="submit" class="btn btn-default float-right">Cancel</button>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                  <!-- /.card -->
   </div>
   --}}
   
   {{-- <div class="login-box" style="padding-top: 5%">
    <div class="login-logo" style="background-color: antiquewhite;">
      <h1>Login</h1>
    </div>
    
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
  
        <form method="POST" action="{{ route('login') }}">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
        </div>
  
        {{-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> --}
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div> --}}




