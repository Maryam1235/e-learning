@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
     <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>User Reports</h1>

          </div>
          <div class="row">
            <div class="col">
              <div class="card">
               
                <div class="card-body ">
                    <div class="d-flex justify-content-between mx-5">
                        <a href="{{route('admin.report')}}" class="btn btn-danger ">Return</a>
                        <a class="btn btn-primary custom-btn " href="{{route('admin.reportPrint')}}">Print</a>
                    </div>

                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="TABLE_USER_2"> 
                      <thead class="thead-light">
                        <tr>
                          <th class="thead">No</th>
                          <th class="thead">Username</th>
                          <th class="thead">Email</th>
                          <th class="thead">Role</th>
                          <th class="thesd">Time Spent</th>
                        </tr>
                      </thead>
                        <tbody>
                          @foreach ($users as $user) 
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->getTimeSpentAttribute() }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
  </div>
  <div>
   <footer class="main-footer">
    <strong>Copyright &copy; <span id="currentYear"></span> <a href="https://sumajkt.go.tz">Visit Our Website</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b> 3.2.0 --}}
    </div>
</footer>

@endsection