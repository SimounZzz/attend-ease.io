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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mb-3">
                            <div class="col-xl-8">
                                <h1 class="mt-4">Scanner configuration</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Change the Configuration of scanners</li>
                                </ol>
                            </div>
                            @if(session()->has('set_1_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('set_1_success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('set_2_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('set_2_success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @if(session()->has('loc_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('loc_success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @error('sec_1_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror

                            @error('sec_2_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror

                            @error('add_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror

                            @error('loc_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror
                         
                            @error('set_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-danger alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-xmark text-danger"></i>
                                        {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror
                            

                            

                        </div>  <!-- end row div -->

                        <div class="col-xl-8 shadow rounded p-3 mb-4">
                            <form action="{{ route('admin-submit-mcu') }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value='1'>
                                <h3>Scanner</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <h4>Section</h4>
                                        <hr>
                                        <select class="form-select" name="sec_1" id="sec_1">
                                            <option disabled>Select section</option>
                                            @foreach($classes as $class)
                                                <option {{ $selected['sec_1'] == $class -> class_name? 'selected' : '' }}>{{ $class -> class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xl-3">
                                        <h4>Location</h4>
                                        <hr>
                                        <select class="form-select" name="loc_1" id="loc_1">
                                            <option disabled>Select location</option>
                                            @foreach($locations as $location)
                                                <option {{ $selected['loc_1'] == $location -> loc? 'selected' : '' }}>{{ $location -> loc }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-xl-4">
                                        <h4>Current configurations</h4>
                                        <hr>
                                        <span>Section: <strong>{{ $selected['sec_1'] }}</strong></span>
                                        <br>
                                        <span>Location: <strong>{{ $selected['loc_1'] }}</strong></span>
                                    </div>

                                    <div class="col-xl-12 mt-4">
                                        <div class="col-md-4">
                                            <input class="btn btn-outline-success" type="submit" value="Submit">
                                        </div> 
                                    </div>   
                                </div> <!-- end row div -->
                            </form>
                        </div>
                        
                        
                        <!--<div class="col-xl-8 shadow rounded p-3 mb-4">-->
                        <!--    <form action="{{ route('admin-submit-mcu') }}" method="post">-->
                        <!--        @csrf-->
                        <!--        <input type="hidden" name="type" value='2'>-->
                        <!--        <h3>Scanner 2</h3>-->
                        <!--        <hr>-->
                        <!--        <div class="row mt-4">-->
                        <!--            <div class="col-xl-3">-->
                        <!--                <h4>Section</h4>-->
                        <!--                <hr>-->
                        <!--                <select class="form-select" name="sec_2" id="sec_2">-->
                        <!--                    <option disabled>Select section</option>-->
                        <!--                    @foreach($classes as $class)-->
                        <!--                        <option  {{ $selected['sec_2'] == $class -> class_name? 'selected' : '' }}>{{ $class -> class_name }}</option>-->
                        <!--                    @endforeach-->
                        <!--                </select>-->
                        <!--            </div>-->

                        <!--            <div class="col-xl-3">-->
                        <!--                <h4>Location</h4>-->
                        <!--                <hr>-->
                        <!--                <select class="form-select" name="loc_2" id="loc_2">-->
                        <!--                    <option disabled>Select location</option>-->
                        <!--                    @foreach($locations as $location)-->
                        <!--                        <option {{ $selected['loc_2'] == $location -> loc? 'selected' : '' }}>{{ $location -> loc }}</option>-->
                        <!--                    @endforeach-->
                        <!--                </select>-->
                        <!--            </div>-->
                        <!--            <div class="col-xl-4">-->
                        <!--                <h4>Current configurations</h4>-->
                        <!--                <hr>-->
                        <!--                <span>Section: <strong>{{ $selected['sec_2'] }}</strong></span>-->
                        <!--                <br>-->
                        <!--                <span>Location: <strong>{{ $selected['loc_2'] }}</strong></span>-->
                        <!--            </div>-->
                        <!--            <div class="col-xl-12 mt-4">-->
                        <!--                <div class="col-md-4">-->
                        <!--                    <input class="btn btn-outline-success" type="submit" value="Submit">-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </form>-->
                        <!--</div>-->
                        


                        <div class="col-xl-4 shadow rounded p-3 mb-4">
                            <form action="{{ route('admin-submit-mcu') }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value='3'>
                                <h4>Add location</h4>
                                <hr>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="location" placeholder="Location" required>
                                    <input type="submit" class="btn btn-outline-success" value="Submit location">
                                </div>
                            </form>
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
        <script src="/js/submenu.js"></script>

        <script>
            $(document).ready(function(){

                var classes = @json($classes);
                var selected = @json($selected);

                var index = classes.indexOf(classes.filter(function(item) { return item.class_name == selected['sec_2'] })[0]);
                // console.log(index);

                var loc_1 = $("#loc_1").val();
                var sec_1 = $("#sec_1").val();

                var loc_2 = $("#loc_2").val();
                var sec_2 = $("#sec_2").val();

                if(loc_1 != "Room"){
                    $("#sec_1").prop("selectedIndex", -1);
                    $("#sec_1").prop("disabled", 1);
                }
                

                if(loc_2 != "Room"){
                    $("#sec_2").prop("selectedIndex", -1);
                    $("#sec_2").prop("disabled", 1);
                }

                $("#loc_1").change(function(){
                    if($(this).find(":selected").val() != "Room"){
                        $("#sec_1").prop("selectedIndex", -1);
                        $("#sec_1").prop("disabled", 1);
                    }
                    else {
                        $("#sec_1").prop("selectedIndex", classes.indexOf(classes.filter(function(item) { return item.class_name == selected['sec_1'] })[0]) + 1);
                        $("#sec_1").prop("disabled", 0);
                    }

                });

                $("#loc_2").change(function(){
                    if($(this).find(":selected").val() != "Room"){
                        $("#sec_2").prop("selectedIndex", -1);
                        $("#sec_2").prop("disabled", 1);
                    }
                    else {
                        $("#sec_2").prop("selectedIndex", classes.indexOf(classes.filter(function(item) { return item.class_name == selected['sec_2'] })[0]) + 1);
                        $("#sec_2").prop("disabled", 0);
                    }
                });
            });

        </script>
    </body>
</html>
