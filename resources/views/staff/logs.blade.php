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
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('staff-home')}}">
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
                            <a class="nav-link" href="{{route('staff-home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{ route('staff-logs') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-timeline fa-sm"></i></div>
                                Users log
                            </a>

                            <a class="nav-link" href="{{ route('latest-log') }}" target="_blank" rel="noopener noreferrer"><div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></div>Live Logs</a>

                            <a class="nav-link" href="{{route('logout')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-rotate-180 fa-lg"></i></div>
                                Logout
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer text-white">
                        <div class="small">Logged in as:</div>
                        Staff | {{ $data -> staff_for }}  | ID: {{ session()->get('id') }}
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main class="shadow rounded p-3">
                    <div class="container-fluid row">
                    <div class="col-xl-12 ">
                        <h1 class="mt-4">Users log</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">NFC Card users history </li>
                                    <!-- <button type="submit" class='btn btn-success ms-3'onclick="tableToExcel()" >Convert to CSV File</button> -->
                        </div>

                        <div class="table-responsive">
                            <table id="usersLog" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><small>Type</small></th>
                                        <th><small>Card</small></th>
                                        <th><small>ID</small></th>
                                        <th><small>Name</small></th>
                                        <th><small>Location</small></th>
                                        <th><small>Time in</small></th>
                                        <th><small>Time out</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $log)
                                        @if($log -> location == $data -> staff_for)
                                            <tr>
                                            <td><small>{{ $log -> type }}</small></td>
                                            <td><small>{{ $log -> card_id}}</small></td>
                                            <td><small>{{ $log -> identity_number }}</small></td>
                                            <td><small>{{ $log -> name }}</small></td>
                                            <td><small>{{ $log -> location }}</small></td>
                                            <td data-sort="{{ $log -> time_in }}"><small>{{ date('h:i A F/d/Y', strtotime($log -> time_in))  }}</small></td>
                                            <td data-sort="{{ $log -> time_out }}"><small>{{ date('h:i A F/d/Y', strtotime($log -> time_out)) }}</small></td>
                                            </tr>     
                                        @endif
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
            </div>     <!-- layoutSidenav_content end div -->
        </div><!-- layoutSidenav end div -->
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/table2excel.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

        <script>

            $(document).ready(function () { 
                $('#usersLog').DataTable( {
                    order: [[6, 'desc']],
                    order: [[6, 'desc']],
                    dom: 'Bfrtip',
                    buttons: [
                        'csvHtml5',
                    ],
                } );
            });
        </script>


        <!-- <script>

            function tableToExcel(){
                var table2excel = new Table2Excel(); 
        table2excel.export(document.querySelectorAll("table.table"));
            }

        </script> -->
       
    </body>
</html>
