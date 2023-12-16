<body class="hold-transition sidebar-mini sidebar-collapse text-sm">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user mr-2"></i>
                        {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href ="{{ route('password.request') }}" class="dropdown-item">
                            <i class="fa fa-user-shield mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                              this.closest('form').submit(); "
                                class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-info  elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <span class="brand-text font-weight-bold" style="font-size: 20px; text-align:center;"> Free
                        Wi-Fi</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('images/wifi.png') }}" class="img-circle elevation-2" alt="wifi Image">
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                        @if (Auth::user()->email == 'ekta@gmail.com')
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item">
                                    <a href="{{ route('reportwork.report') }}" class="nav-link ">
                                        <i class="nav-icon fas fa-file-alt"></i>
                                        <p>Details Report</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
        </form>
