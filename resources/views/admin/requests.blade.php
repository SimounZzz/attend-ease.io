<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NFC-BLOCKCHAIN</title>
        <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link href="/css/dist.style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/header.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
    </head>
    <style>
        /* Modify the background color */
         
        .navbar-dark {
            background-color:  #001033 ;
        }
        .sb-sidenav-menu
        {
            background-color: #001033;
        }
        /* Modify brand and text color */
         
        .sb-sidenav
        {
            background-color: #001033;
        }
        

    </style>
  
    <body class="sb-nav-fixed p-2">
        <nav class="sb-topnav navbar navbar-expand navbar-dark ">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('admin-home') }}">
            <button data-text="Awesome" class="button">
                <span class="actual-text">&nbsp;AttendEase&nbsp;</span>
                <span class="hover-text" aria-hidden="true">&nbsp;AttendEase&nbsp;</span>
            </button>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <div class="collapse navbar-collapse justify-content-end">
                
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 " style='margin-left: auto;'>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                
            </div>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidebar sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-white">Core</div>
                        <ul class="nav flex-column" id="nav_accordion">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin-home') }}">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                        Dashboard
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin-requests') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-exclamation"></i></div>
                                        Requests
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin-manage-requests') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-check"></i></div>
                                        Manage Requests
                                    </a>
                                </li>

                                
                                <li class="nav-item has-submenu">
                                    <a class="nav-link" href="#">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                        Users
                                    </a>
                                    <ul class="submenu collapse">
                                    <li><a class="nav-link" href="{{ route('admin-users-faculty') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>Faculty</a></li>
                                        <li><a class="nav-link" href="{{ route('admin-users-student') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>Student</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item has-submenu">
                                    <a class="nav-link" href="#">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                        Users Log
                                    </a>
                                    <ul class="submenu collapse">
                                    <li><a class="nav-link" href="{{ route('admin-logs-room') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>Room</a></li>
                                        <li><a class="nav-link" href="{{ route('admin-logs-location') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"></i></div>Location</a></li>
                                        <li><a class="nav-link" href="{{ route('latest-log') }}" target="_blank" rel="noopener noreferrer"><div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>Live Logs</a></li>
                                    </ul>
                                </li>


                                <li class="nav-item">                               
                                    <a class="nav-link" href="{{ route('admin-blocks') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-brands fa-hive"></i></div>
                                        Blocks
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin-set-mcu') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-brands fa-nfc-directional fa-lg"></i></div>
                                        Manage Readers/Scanners
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-rotate-180 fa-lg"></i></div>
                                        Logout
                                    </a>
                                </li>
                           </ul>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer text-white">
                        <div class="small">Logged in as:</div>
                        Admin | ID: {{ session()->get('id') }}
                    </div>
                </nav>
            </div>




        

            <div id="layoutSidenav_content">
                <main class="shadow rounded p-3">
                    <div class="container-fluid px-4">
                        <div class="row mb-3">
                            <div class="col-xl-8">
                                <h1 class="mt-4">Requests</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Pending Users</li>
                                </ol>
                            </div>
                         
                            @if(session()->has('add_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                    <strong>{{ session()->get('add_success') }}</strong> has been accepted.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif


                            @if(session()->has('reject_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                    <strong>{{ session()->get('reject_success') }}</strong> has been rejected.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            
                        </div>  <!-- end row div -->



                            <div class="row">
                            <div class="col-xl-12 table-responsive">
                                <table id="requestsTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class='text-center'><small></small>Identity Number</th>
                                            <th><small>Fullname</small></th>
                                            <th><small>Type</small></th>
                                            <th><small>Year level</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>Date added</small></th>

                                            <th><small>Regform</small></th>
                                            <th class="text-center"><small>Option</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                            @if($request -> status == '0' && $request -> rejected == '0')
                                            <tr>
                                                <td class="text-center"><small>{{ $request -> student_number }}</small></td>
                                                <td><small>{{ $request -> lname . ' ' . $request -> fname . ' ' . $request -> mname}}</small></td>
                                                <td><small>{{ $request -> type}}</small></td>
                                                <td><small>{{ $request -> ylevel }}</small></td>
                                                <td><small>{{ $request -> dep}}</small></td>
                                                <td><small>{{ $request -> course}}</small></td>
                                                <td data-sort="{{ $request -> created_at }}"><small>{{ date('h:i A F/d/Y', strtotime($request -> created_at)) }}</small></td>
                                                <td>
                                                    @if($request -> type == "Student")
                                                     <a class="btn" target="_blank" href="{{ $request->regform }}"><small>View</small></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('admin-accept-request') }}?id={{ $request -> student_number }}" class='btn btn-sm btn-success me-2'>Accept</a>
                                                        <a href="{{ route('admin-reject-request') }}?id={{ $request -> student_number }}" class='btn btn-sm btn-danger'>Reject</a>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>



                

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; NFC BLOCKCHAIN 2023</div>
                        </div>
                    </div>
                </footer>
            </div>     <!-- layoutSidenav_content end div -->
        </div><!-- layoutSidenav end div -->
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="/js/submenu.js"></script>

        <script>
            $(document).ready(function () { $('#requestsTable').DataTable(); });
        </script>
    </body>
</html>
