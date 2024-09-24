@extends('components.dashmaster')

@section('body')
     <!-- Main Content -->
     <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Class Reports</h1>

          </div>
          <div class="row">
            <div class="col">
              <div class="card">
               
                <div class="card-body ">
                    <div class="d-flex justify-content-between mx-5">
                        <a href="{{route('admin.report')}}" class="btn btn-danger ">Return</a>
                        {{-- <button class="btn btn-primary custom-btn" onclick="window.print()">Print</button> --}}
                        <a class="btn btn-primary custom-btn " href="{{route('admin.reportPrint')}}">Print</a>
                    </div>

                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="TABLE_USER_2"> 
                      <thead class="thead-light">
                        <tr>
                          <th class="thead">No</th>
                          <th class="thead">Class Name</th>
                    
                        </tr>
                      </thead>
                        <tbody>
                          @foreach ($classes as $class) 
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $class->name }}</td>
                        
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
@endsection