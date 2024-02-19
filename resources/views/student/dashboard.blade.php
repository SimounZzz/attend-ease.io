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
        <link href="/css/dist.style.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <link href="/css/header.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="images/favicon.png"/>
    </head>
    <style>
        /* Modify the background color */
         
        .navbar-dark {
            background-color:   #001033  ;
        }
        .sb-sidenav-menu
        {
            background-color: #001033;
        }
        /* Modify brand and text color */
         
        /* .sb-sidenav .sb-sidenav-footer
        {
            background-color: #001033;
        } */
        /* === removing default button style ===*/

    </style>
    <body class="sb-nav-fixed p-2">
        <nav class="sb-topnav navbar navbar-expand navbar-dark ">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ route('student-home') }}">
             <button data-text="Awesome" class="button">
                <span class="actual-text">&nbsp;AttendEase&nbsp;</span>
                <span class="hover-text" aria-hidden="true">&nbsp;AttendEase&nbsp;</span>
            </button></a>
            <!-- Sidebar Toggle-->
            
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
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
                <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
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
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mb-3 shadow rounded">
                            <div class="col-xl-6">
                                <div class="col-xl-12">
                                    <h1 class="mt-4 d-inline">Announcements<a tabindex="0" class="align-middle btn btn-outline-secondary btn-sm" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="More Information" data-bs-content="Testing test"><i class="bi bi-info-circle"></i></a></h1>

            
                                </div>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">View announcements, events, and important messages.</li>
                                </ol>
                            
                             </div>
                             
                        </div>  <!-- end row div -->

                        <div class="row">
                            @foreach($all_announcements as $announcement)
                                    <div class="col-xl-12 mb-4 shadow rounded p-3">
                                        <h4 class="mb-3"><strong>{{ $announcement -> subject }}</strong></h4>
                                    @foreach($classes as $class)
                                        @if($announcement -> class_id == $class -> class_id)
                                            <p class="text-muted"><small>{{ $class -> class_name }}</small></p>
                                        @endif
                                    @endforeach
                                        <textarea class="form-control mb-3" col="10" row="30" readonly>{{ $announcement -> content }}</textarea>
                                        <p>Posted by <strong>{{ $announcement -> created_by }}</strong> on <strong class="fst-italic text-muted">{{ date('h:i A F/d/Y', strtotime($announcement -> created_at)) }}</strong></p>
                                    </div>
                            @endforeach
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
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>
