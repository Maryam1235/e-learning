@extends('components.dashmaster')


@section('body')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper custom-dashboard">

     <div class="card">
              <!-- /.card-header -->
      <div class="card-body">

                <form action="{{ route('admin.updatePassword', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" required class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>
            </div>

    </div>
        
</div>

@endsection