<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NFC-BLOCKCHAIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
        <link href="/css/dist.style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/header.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <div class="sb-sidenav-menu ">
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
                <main class="">
                    <div class="container-fluid px-4">
                        <div class="row mb-3">
                            <div class="col-xl-8">
                                <h1 class="mt-4">Dashboard</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Add annoucements, events, or important message.</li>
                                </ol>
                            </div>

                            @if(session()->has('add_success'))
                                <div class="col-xl-3 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('add_success') }}!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            @error('add_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror

                        </div>  <!-- end row div -->

                        <div class="row">
                            <div class="col-xl-6 shadow rounded p-4">
                                <h4>Add announcement</h4>
                                <form action="{{ route('admin-add-announcement') }}" method="post">
                                    @csrf
                                    <input class="form-control mb-2" type="text" name="subject" placeholder="Enter subject" required>
                                    <textarea class="form-control mb-2" name="content" cols="30" rows="10" placeholder="Enter content" required></textarea>
                                    <select class="form-select mb-2" name="type">
                                        <option disabled>Select type</option>
                                        <option>All</option>
                                        <option>Student</option>
                                        <option>Faculty</option>
                                    </select>
                                    <input class="btn btn-outline-success" type="submit" value="Submit" onclick="submitForm(event)">
                                </form>
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



        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>

            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/scripts.js"></script>
        <script src="/js/submenu.js"></script>

    <script>
        function submitForm(e){
            if(!confirm('Are you sure you want to submit?')){
                e.preventDefault();
            }
        }

        $('.stick-top').affix({
            offset: {top: 50}
        });
    </script>

    </body>
</html>
