<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NFC-BLOCKCHAIN</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
        <link href="/css/dist.style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/header.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
       
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

        
        .popover-header {
            background-color: #001033;
            color:white;
        }


    </style>
   
    <body class="sb-nav-fixed p-2">
    <nav class="sb-topnav navbar navbar-expand navbar-dark ">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('student-home') }}">
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
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-white">Core</div>
                            <a class="nav-link" href="{{ route('student-home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt "></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{ route('student-profile') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card fa-sm"></i></i></div>
                                 Profile
                            </a>

                            <a class="nav-link" href="{{ route('student-logs') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-timeline fa-sm"></i></div>
                                Activity Log
                            </a>

                            <a class="nav-link" href="{{ route('logout') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-rotate-180 fa-lg"></i></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer text-white">
                        <div class="small">Logged in as:</div>
                        <strong>{{ $data -> lname}}, {{ substr($data -> fname, 0, 1)}}.</strong>&nbsp&nbspID: {{ session()->get('id') }}
                    </div>
                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main class="shadow rounded p-3">
                    <div class="container-fluid px-4">
                            <div class="row mb-3">
                                <div class="col-xl-6">
                                    <h1 class="mt-4">Activity Logs</h1>
                                    <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item active">Monitor your Logs<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Activity Logs" data-bs-html="true" data-bs-content="<b>Table:</b> You can view your every transactions.<hr>
	                                    <b>Search:</b> You can search for any data from any column in table. (Ex. 4CPE-A).
                                        <hr>
                                        <b>Entries:</b> You can choose how many entries to be shown in table."><i class="bi bi-info-circle"></i></a></li>
                                    </ol>
                                </div>
                            </div>  <!-- end row div -->

                            <div class="row table-responsive">
                                <table class="table table-hover" id="student_class">
                                    <thead>
                                        <tr>
                                            <th><small>Location</small></th>
                                            <th><small>Class</small></th>
                                            <th><small>Time-in</small></th>
                                            <th><small>Time-out</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logs as $log)
                                            <tr>
                                                <td><small>{{ $log -> location }}</small></td>
                                                <td><small>{{ $log -> section }}</small></td>
                                                <td data-sort="{{ $log -> time_in }}"><small>{{ date('h:i A F/d/Y', strtotime($log -> time_in))  }}</small></td>
                                                <td data-sort="{{ $log -> time_out }}"><small>{{ date('h:i A F/d/Y', strtotime($log -> time_out)) }}</small></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            </div>
        </div>









        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/moreInfo.js"></script>

        <script>
              var table = $('#student_class').DataTable();
        </script>
    </body>
</html>
