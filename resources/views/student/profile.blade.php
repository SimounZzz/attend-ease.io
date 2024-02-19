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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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

        .image-container {
            max-width: 15%;
            max-height: 100%;
            overflow: hidden;
        }
        .image-container img {
            width: 100%;
            height: auto;
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
                <main class="">
                    <div class="container-fluid px-4">
                        <div class="mb-3 shadow p-3 d-flex justify-content-between">
                            <div class="col-xl-8">
                                <h1 class="mt-4">Profile</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">View User information</li>
                                </ol>
                            </div>

                            <div class="col-xl-4 image-container">
                                @if($data->picture)
                                    <img src="{{ $data->picture }}" alt="avatar">
                                @else
                                    <img src="/images/default-pic.svg" alt="avatar">
                                @endif
                            </div>
                        </div>  <!-- end row div -->
                            
                        <div class="row">
                            <div class="col-xl-4 mb-3 me-1 p-2">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        Personal information
                                    </div>
                                    <div class="card-body p-4">
                                        <strong><label for="">Fullname</label></strong>
                                        <div class="col-md-12">
                                            <input type="text" class='form-control mb-2' value="{{ $data -> lname . ' ' . $data -> fname . ' ' . $data -> mname}}" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>
                                                <label for="">Sex</label>
                                            </strong>
                                            <input type="text" class='form-control mb-2' value="{{ $data -> sex}}" name="" id="" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <strong>
                                                <label for="">Birthdate</label>
                                            </strong>
                                            <input type="text" class='form-control mb-2' value="{{ $data -> birthdate}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 mb-3 me-1 p-2">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        Contact information
                                    </div>
                                    <div class="card-body p-4">
                                        <strong><label for="">Email</label></strong>
                                        <input type="text" class='form-control mb-2' value="{{ $data -> email}}" readonly>
                                        <strong><label for="">Contact number</label></strong>
                                        <input type="text" class='form-control mb-2' value="{{ $data -> contact}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 mb-3 p-2">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        Academic information
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong><label for="">Student number</label></strong>
                                                <input type="text" class='form-control mb-2' value="{{ $data -> student_number}}" name="" id="" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>
                                                    <label for="">Year level</label>
                                                    <input type="text" class='form-control mb-2' value="{{ $data -> ylevel}}" readonly>
                                                </strong>
                                            </div>
                                        </div>
                                        <strong><label for="">Department</label></strong> 
                                        <input type="text" class='form-control mb-2' value="{{ $data -> dep}}" readonly>
                                        <strong><label for="">Course</label></strong>
                                        <input type="text" class='form-control mb-2' value="{{ $data -> course}}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 mb-3 p-2 me-1">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        My RFID
                                    </div>
                                    <div class="card-body p-2">
                                        <strong><label for="">Card number</label></strong>
                                        @if($data ->rfid == '')
                                            <input type="text" class='form-control mb-2' value="RFID not activated yet" readonly>
                                        @else
                                            <input type="text" class='form-control mb-2' value="{{ $data ->rfid }}" readonly>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-3 mb-3 p-2 me-1">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        My Registration form
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <a class="btn btn-outline-secondary" href="{{ $data -> regform }}">View / Download</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  <!-- end row div -->
                        <div class="row">
                            <div class="col-xl-8 mb-3 p-2">
                                <div class="card">
                                    <div class="card-header text-white" style=" background-color:  #001033 ;">
                                        My classes <a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="My Classes" data-bs-html="true" data-bs-content="<b>Table:</b> You can view your currently enrolled classes.<hr>
	                                    <b>Search:</b> You can search from your current classes. (Ex. 4CPE-A).
                                        <hr>
                                        <b>Entries:</b> You can choose how many entries to be shown in table."><i class="bi bi-info-circle"></i></a>
                                    </div>
                                    <div class="card-body p-4 table-responsive">

                                        <table class="table table-hover" id="my_class">
                                            <thead>
                                                <tr>   
                                                    <th class="text-nowrap"><small>Class ID</small></th>
                                                    <th><small>Class</small></th>
                                                    <th><small>Faculty</small></th>
                                                    <th class="text-nowrap"><small>Date Added to Class</small></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($classes as $class)
                                                    @foreach($professor as $prof)
                                                        @if($class -> faculty_id == $prof -> student_number)
                                                            <tr>
                                                                <td><small>{{ $class -> class_id }}</small></td>
                                                                <td><small>{{ $class -> class_name }}</small></td>
                                                                <td><small>{{ $prof -> lname . ' ' . $prof -> fname . ' ' . $prof -> mname }}</small></td>
                                                                <td data-sort="{{ $class -> created_at }}"><small>{{ date('h:i A F/d/Y', strtotime($class -> created_at))  }}</small></td>
                                                            </tr>
                                                            
                                                        @endif
                                                    @endforeach
                                                @endforeach
 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row div -->
                    </div>  <!-- end container div -->
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
            var table = $('#my_class').DataTable( {
                select: true,
            } );
        </script>
    </body>
</html>
