<x-layout />
  
@include('components.nav')

    {{-- sidebar --}}
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4 "style="position: fixed; height: 100vh; overflow-y: auto;"> --}}
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/logo-suma.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SUMAJKT E-Learning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                       
                        @if (auth()->check() && auth()->user()->role === 'admin')
                                <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">

                                </div>
                                <div class="info">
                                <a href="#" class="d-block">Administrator</a>
                                </div>
                            </div>

                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link" 
                                    href="{{ route('admin.dashboard') }}">
                                    <span class="nav-icon fa fa-tachometer "></span>
                                    <p>Dashboard</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{route('admin.users')}}">
                                    <span class="nav-icon fa fa-users "></span>
                                    <p>User-Management</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{route('admin.classes')}}">
                                    <span class="nav-icon fa fa-school "></span>
                                    <p>Classes</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('admin.quizzes.index')}}">
                                    <span class="nav-icon fa fa-file-text "></span>
                                    <p>Quizzes</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{ route('admin.onlineSessions') }}">
                                    <span class="nav-icon fa fa-chalkboard-teacher"></span>
                                    <p>Live Session</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('admin.report')}}">
                                    <span class="nav-icon fa fa-bar-chart"></span>
                                    <p>Reports</p>
                                </a>
                            </li>
                              <li class="nav-item">
                                <a class="nav-link "
                                    href="/admin/blogs">
                                    <span class="nav-icon fa fa-comments"></span>
                                    <p>Blog</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="/to-do-list">
                                    <span class="nav-icon fa ion-clipboard"></span>
                                    <p>To_do_List</p>
                                </a>
                            </li>
                        @endif

                        @if (auth()->check() && auth()->user()->role === 'teacher')
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">

                                </div>
                                <div class="info">
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                                </div>
                            </div>

                            <!-- SidebarSearch Form -->
                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page"
                                        href="{{ route('teacher.dashboard') }}">
                                        <span class="nav-icon fa fa-tachometer "></span>
                                        <p>Dashboard</p>
                                    </a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{route('teacher.users')}}">
                                        <span class="nav-icon fa fa-users"></span>
                                        <p>User-Management</p>
                                    </a>
                                </li><br>
                            
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{route('teacher.classes')}}">
                                        <span class="nav-icon fa fa-school"></span>
                                        <p>Classes</p>
                                    </a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="{{route('teacher.assignments')}}">
                                        <span class="nav-icon fa fa-clipboard"></span>
                                        <p>Assignments</p>
                                    </a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="{{route('teacher.assignments.submissions')}}">

                                        <span class="nav-icon fa fa-upload "></span>
                                        <p>Submissions</p>
                                    </a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="{{route('quizzes.index')}}">
                                        <span class="nav-icon fa ion-clipboard"></span>
                                        <p>Quizzes</p>
                                    </a>

                                </li><br>
                                <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('teacher.change.password')}}">
                                    <span class="nav-icon fa fa-key "></span>
                                    <p>Change Password</p>
                                </a>
                                </li><br>

                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link "
                                        href="/teacher/quizzes/{quiz}/results">
                                        <span class="nav-icon fa ion-clipboard"></span>
                                        <p>Quiz  Results</p>
                                    </a>
                                </li> --}}

                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="{{ route('teacher.onlineSessions') }}">
                                        <span class="nav-icon fa fa-chalkboard-teacher"></span>
                                        <p>Live Session</p>
                                    </a>
                                </li><br>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{route('teacher.report')}}">
                                        <span class="nav-icon fa fa-bar-chart "></span>
                                        <p>Reports</p>
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link "
                                        href="/teacher/blogs">
                                        <span class="nav-icon fa fa-comments"></span>
                                        <p>Blog</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                        href="/to-do-list">
                                        <span class="nav-icon fa ion-clipboard"></span>
                                        <p>To_do_List</p>
                                    </a>
                                </li>
                    @endif


                        @if (auth()->check() && auth()->user()->role === 'student')
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                                
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                                </div>
                            </div>
                                
                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                             <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                             <div class="input-group-append">
                                 <button class="btn btn-sidebar">
                                 <i class="fas fa-search fa-fw"></i>
                                 </button>
                             </div>
                             </div>
                         </div>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page"
                                href="{{ route('student.dashboard') }}">
                                <span class="nav-icon fa fa-tachometer"></span>
                                <p>Dashboard</p>  
                            </a>
                        </li><br>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('student.class') }}">
                                    <span class="fa fa-school"></span>
                                    <p>Class</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('student.assignments')}}">
                                    <span class="nav-icon fa fa-file-text"></span>
                                    <p>Assignments</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('student.quizzes')}}">
                                    <span class="nav-icon fa fa-file-text "></span>
                                    <p>Quizzes</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{route('change.password')}}">
                                    <span class="nav-icon fa fa-key "></span>
                                    <p>Change Password</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('student.onlineSessions') }}">
                                    <span class="nav-icon fa fa-chalkboard-teacher"></span>
                                    <p>Live Session</p>
                                </a>
                            </li><br>
                              <li class="nav-item">
                                <a class="nav-link"
                                    href="/student/blogs">
                                    <span class="nav-icon fa fa-comments"></span>
                                    <p>Blog</p>
                                </a>
                            </li><br>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="/to-do-list">
                                    <span class="nav-icon fa ion-clipboard"></span>
                                    <p>To_do_List</p>
                                </a>
                            </li>
                        @endif


                    </ul>
                </div>
            </nav>
        </aside>
        
                @yield('body')
            
           
        </div>
    </div>




