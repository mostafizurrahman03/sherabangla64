<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | @yield('title','Dashboard')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href=" {{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href=" {{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/select2/css/select2.min.css">

   <!-- Dynamic Favicon -->
    <link rel="icon" href="{{ $favicon }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">
    
    <!-- For better compatibility -->
    <link rel="apple-touch-icon" href="{{ $favicon }}">
    <link rel="apple-touch-icon-precomposed" href="{{ $favicon }}">

  @stack('css')

  <!-- Custom Modern Touch for AdminLTE Sidebar -->
  <style>
    .sidebar-dark-navy {
      background-color: #0f172a !important; /* Slate / Dark Blue */
    }

    .sidebar-dark-navy .nav-sidebar > .nav-item > .nav-link.active {
      background-color: #2563eb !important; /* Modern Royal Blue */
      color: #ffffff !important;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
      border-radius: 6px;
    }

    .sidebar-dark-navy .nav-sidebar .nav-link {
      border-radius: 6px;
      margin-bottom: 2px;
      transition: all 0.2s ease;
    }

    .sidebar-dark-navy .nav-sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.08) !important;
    }
  </style>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const body = document.body;
      const mainNavbar = document.querySelector('.main-header');
      const mainSidebar = document.querySelector('#mainSidebar');
      const darkModeToggle = document.getElementById('darkModeToggle');

      // LocalStorage থেকে পূর্বের মোড চেক করা
      const currentTheme = localStorage.getItem('theme');

      if (currentTheme === 'dark') {
        enableDarkMode();
      } else {
        enableLightMode();
      }

      if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function (e) {
          e.preventDefault();
          if (body.classList.contains('dark-mode')) {
            enableLightMode();
            localStorage.setItem('theme', 'light');
          } else {
            enableDarkMode();
            localStorage.setItem('theme', 'dark');
          }
        });
      }

      function enableDarkMode() {
        body.classList.add('dark-mode');
        if (mainNavbar) {
          mainNavbar.classList.remove('navbar-white', 'navbar-light');
          mainNavbar.classList.add('navbar-dark', 'navbar-black');
        }
        if (mainSidebar) {
          mainSidebar.classList.remove('sidebar-light-navy');
          mainSidebar.classList.add('sidebar-dark-navy');
        }
        const icon = darkModeToggle ? darkModeToggle.querySelector('i') : null;
        if (icon) {
          icon.classList.remove('fa-moon');
          icon.classList.add('fa-sun');
        }
      }

      function enableLightMode() {
        body.classList.remove('dark-mode');
        if (mainNavbar) {
          mainNavbar.classList.remove('navbar-dark', 'navbar-black');
          mainNavbar.classList.add('navbar-white', 'navbar-light');
        }
        if (mainSidebar) {
          mainSidebar.classList.remove('sidebar-dark-navy');
          mainSidebar.classList.add('sidebar-light-navy');
        }
        const icon = darkModeToggle ? darkModeToggle.querySelector('i') : null;
        if (icon) {
          icon.classList.remove('fa-sun');
          icon.classList.add('fa-moon');
        }
      }
    });
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('admin') }}/dist/img/user1-128x128.jpg" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('admin') }}/dist/img/user8-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('admin') }}/dist/img/user3-128x128.jpg" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

        <!-- Dark Mode Toggle Toggle Button -->
        <li class="nav-item">
          <a class="nav-link" id="darkModeToggle" href="#" role="button">
            <i class="fas fa-moon"></i>
          </a>
        </li>

        <!-- Fullscreen -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!-- Profile & Logout -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-user"></i>
          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <!-- User Info -->
            <div class="dropdown-item">
              <div class="media">
                <img src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title mb-0">
                    Brad Diesel
                  </h3>
                  <p class="text-sm text-muted mb-0"><i class="far fa-clock mr-1"></i> Online</p>
                </div>
              </div>
            </div>

            <div class="dropdown-divider"></div>

            <!-- Profile Link -->
            <a href="{{ route('home') }}" class="dropdown-item">
              <i class="fas fa-user-cog mr-2"></i> Profile
            </a>

            <!-- Logout Link -->
            <a href="{{ route('logout') }}" class="dropdown-item"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    @include('partial.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      @yield('content')

    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>
          Copyright &copy; <?php echo date('Y'); ?> 
          <a href="https://techgiantpro.com/" target="_blank">{{ $appName }}</a>
      </strong>
      {{ $copyrightText }}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src=" {{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src=" {{ asset('admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src=" {{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src=" {{ asset('admin') }}/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src=" {{ asset('admin') }}/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src=" {{ asset('admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src=" {{ asset('admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src=" {{ asset('admin') }}/plugins/moment/moment.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src=" {{ asset('admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src=" {{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src=" {{ asset('admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src=" {{ asset('admin') }}/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src=" {{ asset('admin') }}/dist/js/pages/dashboard.js"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('admin') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

  <script src="{{ asset('admin') }}/plugins/toastr/toastr.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src=" {{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/jszip/jszip.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src=" {{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="{{ asset('admin') }}/plugins/inputmask/jquery.inputmask.min.js"></script>

  <!-- Select2 -->
  <script src="{{ asset('admin') }}/plugins/select2/js/select2.full.min.js"></script>

  <script>
    $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": true, // Enable dropdown for selecting number of rows
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
              "lengthMenu": [25, 50, 100, 500], // Options for number of rows per page
              "pageLength": 25, // Default number of rows per page
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": true, // Enable length menu
              "lengthMenu": [25, 50, 100, 500], // Options for number of rows per page
              "pageLength": 25, // Default number of rows per page
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
  </script>

  <script>
    function showToast(type, message) {
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 5000
              });
  
              Toast.fire({
                  icon: type,
                  title: message
              });
          }
  </script>
  <script>
    $(function() {
              //Initialize Select2 Elements
              $('.select2').select2()
  
              //Initialize Select2 Elements
              $('.select2bs4').select2({
                  theme: 'bootstrap4'
              })
  
              //Datemask dd/mm/yyyy
              $('#datemask').inputmask('dd/mm/yyyy', {
                  'placeholder': 'dd/mm/yyyy'
              })
              //Datemask2 mm/dd/yyyy
              $('#datemask2').inputmask('mm/dd/yyyy', {
                  'placeholder': 'mm/dd/yyyy'
              })
              //Money Euro
              $('[data-mask]').inputmask()
  
              //Date picker
              $('#reservationdate').datetimepicker({
                  format: 'L'
              });
  
              //Date and time picker
              $('#reservationdatetime').datetimepicker({
                  icons: {
                      time: 'far fa-clock'
                  }
              });
  
              //Date range picker
              $('#reservation').daterangepicker()
              //Date range picker with time picker
              $('#reservationtime').daterangepicker({
                  timePicker: true,
                  timePickerIncrement: 30,
                  locale: {
                      format: 'MM/DD/YYYY hh:mm A'
                  }
              })
              //Date range as a button
              $('#daterange-btn').daterangepicker({
                      ranges: {
                          'Today': [moment(), moment()],
                          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                          'This Month': [moment().startOf('month'), moment().endOf('month')],
                          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                              'month').endOf('month')]
                      },
                      startDate: moment().subtract(29, 'days'),
                      endDate: moment()
                  },
                  function(start, end) {
                      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                          'MMMM D, YYYY'))
                  }
              )
  
              //Timepicker
              $('#timepicker').datetimepicker({
                  format: 'LT'
              })
  
  
          })
  </script>

  <script>
    function confirmDelete(event, userId) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $("#delete-form-" + userId).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    console.log('User cancelled deletion');
                }
            });
        }
  </script>

  @stack('js')
  @yield('js')

</body>

</html>