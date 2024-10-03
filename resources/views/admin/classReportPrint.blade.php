


<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="wrapper text-center">
                <h2>Learning Management System</h2>
                <h5>Class Data Report</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="TABLE_Report_2">
                    <thead class="thead-light">
                        <tr>
                            <th class="thead">No</th>
                            <th class="thead">Class Name</th>
                          
                        </tr>
                    </thead>
                    <tbody class="thead-light">
                        @foreach ($classes as $class)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $class->name }}</td>
                        
                        </tr>
                        {{-- Illuminate\Support\Facades\ --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
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
    // window.print()

         window.onload = function() {
            window.print();

            // window.onafterprint = function() {
            //     window.location.href = "{{route('admin.reportPrint')}}"; 
            // };

  
        };

</script>