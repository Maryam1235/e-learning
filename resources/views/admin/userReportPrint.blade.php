


<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="wrapper text-center">
                <h2>Learning Management System</h2>
                <h5>User Data Report</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" id="TABLE_Report_2">
                    <thead class="thead-light">
                        <tr>
                            <th class="thead">No</th>
                            <th class="thead">username</th>
                            <th class="thead">email</th>
                            <th class="thead">role</th>
                            <th class="thesd">Time Spent</th>
                        </tr>
                    </thead>
                    <tbody class="thead-light">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->getTimeSpentAttribute() }}</td>
                        </tr>
                        {{-- Illuminate\Support\Facades\ --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // window.print()

         window.onload = function() {
            window.print();

            // window.onafterprint = function() {
            //     window.location.href = "{{route('admin.reportPrint')}}"; 
            // };

  
        };

</script>