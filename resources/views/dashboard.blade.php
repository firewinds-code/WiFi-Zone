<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <link rel="icon" href="{{env('COGENT_FAVICON')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/codemirror/theme/monokai.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet')}}">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse text-sm">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
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

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">WiFi QR Code</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Zone</label>
                                        <select class="form-control select2 select2-danger"
                                            data-dropdown-css-class="select2-danger" style="width: 100%;"
                                            name="zone_id" id="zone_id">
                                            <option selected="selected">Select a Zone</option>
                                            <option value = "south">South</option>
                                            <option value = "west">West</option>
                                            <option value = "north">North</option>
                                            <option value = "east">East</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <div class="spinner-border text-danger" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <br>
                                    @php $link = 'http://localhost/wifi-zone/public/wifi/';  @endphp
                                    <div id="south"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <div class="form-group">
                                            @php $south = $link.'south'; @endphp
                                            {!! QrCode::size(200)->generate($south) !!}
                                        </div>
                                    </div>

                                    <div id="west"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <div class="form-group">
                                            @php $west = $link.'west'; @endphp
                                            {!! QrCode::size(200)->generate($west) !!}
                                        </div>
                                    </div>

                                    <div id="east"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <div class="form-group">
                                            @php $east = $link.'east'; @endphp
                                            {!! QrCode::size(200)->generate($east) !!}
                                        </div>
                                    </div>

                                    <div id="north"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        <div class="form-group">
                                            @php $north = $link.'north'; @endphp
                                            {!! QrCode::size(200)->generate($north) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer" align="center">
            <div class="float-right d-none d-sm-block">
            </div>
            <p> Ekta Mangal &copy; <?php echo date('Y'); ?> - <?php echo date('Y') + 1; ?> All Rights Reserved.</p>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset('assets/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <div class="overlay"></div>

    @error('pin_mask')
        <script type=" text/javascript">
  $(function() {
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
      });

      Toast.fire({
          type: 'error',
          title: '{{ $message }}'
      });
  })
</script>
    @enderror
    <script>
        $(function() {
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        });
        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @elseif (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @elseif (Session::has('info'))
                toastr.info("{{ Session::get('info') }}");
            @endif
        });
    </script>
    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('.select2bs4Edit').select2({
                theme: 'bootstrap4'
            })
            $('.select2bs4Create').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script>
        $(document).ready(function() {

            $("#north").hide();
            $("#east").hide();
            $("#west").hide();
            $("#south").hide();
            $(".spinner-border").hide();

            $("#zone_id").change(function() {
                $(".spinner-border").show();
                var zone_id_val = $(this).val();
                if (zone_id_val == 'south') {
                    $(".spinner-border").hide();
                    $("#south").show();
                    $("#north").hide();
                    $("#east").hide();
                    $("#west").hide();
                } else if (zone_id_val == 'north') {
                    $(".spinner-border").hide();
                    $("#north").show();
                    $("#east").hide();
                    $("#west").hide();
                    $("#south").hide();
                } else if (zone_id_val == 'east') {
                    $(".spinner-border").hide();
                    $("#east").show();
                    $("#west").hide();
                    $("#south").hide();
                    $("#north").hide();
                } else if (zone_id_val == 'west') {
                    $(".spinner-border").hide();
                    $("#west").show();
                    $("#north").hide();
                    $("#east").hide();
                    $("#south").hide();
                } else {
                    $("#north").hide();
                    $("#east").hide();
                    $("#west").hide();
                    $("#south").hide();
                    $(".spinner-border").show();
                    setTimeout(function() {
                        $(".spinner-border").hide();
                    }, 1000);
                }
            });
        });
    </script>

</body>

</html>
