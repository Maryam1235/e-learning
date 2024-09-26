@extends('components.dashmaster')
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div class="chat-header clearfix">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <span class="fa fa-user fa-2x me-2"></span>

                            <div class="chat-about">
                                <h6 id="receiver-name" class="m-b-0">{{ $teacher->name }}</h6>
                                
                                <small id="receiver-last-seen"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">

 
 <div class="card-body">
<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
       
              
                <div class="chat">
                   


                    <div id="chat-history" class="chat-history">
                        <ul class="m-b-0">
                            @foreach($messages as $message)
                            <li>
                                <div class="message-data">
                                    {{-- <img src="{{ $message->user->profile_picture_url }}" alt="avatar"> --}}
                                    <span class="message-data-name">{{ $message->user->name }}</span>
                                    <span class="message-data-time">{{ $message->created_at->format('h:i A') }}</span>
                                </div>
                                <div class="message my-message">
                                    {{ $message->message }}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                  
                    <div class="chat-message clearfix">
                        <form id="message-form" action="{{ route('teacher.blog.store') }}" method="POST">
                            @csrf
                            <div class="input-group mb-0">
                                <input type="text" name="message" class="form-control" placeholder="Enter text here..." required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Send</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       
    </div>
</div>


</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- ./wrapper -->



@endsection








