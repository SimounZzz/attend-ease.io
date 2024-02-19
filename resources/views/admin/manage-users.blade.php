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
        <link href="css/dist.style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
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
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-white">Core</div>
                       
                            <a class="nav-link" href="{{ route('admin-home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                             <a class="nav-link" href="{{ route('admin-requests') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-exclamation"></i></div>
                                Requests
                            </a>

                            <a class="nav-link" href="{{ route('admin-manage-requests') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-check"></i></div>
                                Manage Requests
                            </a>

                            <a class="nav-link" href="{{ route('admin-users') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                Users
                            </a>

                            <a class="nav-link" href="{{ route('admin-users-log') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-timeline fa-sm"></i></div>
                                Users Log
                            </a>

                            <a class="nav-link" href="{{ route('admin-blocks') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-timeline fa-sm"></i></div>
                                Blocks
                            </a>


                            <a class="nav-link" href="{{ route('admin-set-mcu') }}">
                                <div class="sb-nav-link-icon"><i class="fa-brands fa-nfc-directional fa-lg"></i></div>
                                Manage Readers/Scanners
                            </a>

                            <a class="nav-link" href="{{ route('logout') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-rotate-180 fa-lg"></i></div>
                                Logout
                            </a>
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
                        <div class="row">
                            <div class="col-xl-12 mb-3">
                                <h3>Manage Users</h3>
                            </div>

                            <div class="col-xl-6">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero incidunt voluptates pariatur excepturi ullam sapiente quas, cum dolor nesciunt voluptatibus tempora atque quisquam. Eligendi maxime quis voluptatem veniam hic exercitationem.
                            </div>

                            <div class="col-xl-6">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, commodi tempora autem voluptatibus ipsa obcaecati consequatur nobis doloremque voluptatem dignissimos atque ipsam nihil, laboriosam repudiandae soluta maiores animi cumque deserunt nisi iusto. Soluta inventore iusto dolorum ex labore hic aliquid amet illum, facilis ab iste non consequuntur veritatis nisi explicabo fugiat porro ad debitis ducimus minima eius. Aut ab facere quae voluptates possimus doloribus magni eaque quidem nihil inventore, ratione, repellendus maiores, sequi enim ut! Ducimus culpa unde nulla minus odit nihil quos perspiciatis dolorem tempore exercitationem, facilis temporibus laborum. Aspernatur qui eius quaerat inventore et nisi nostrum quae amet!
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
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
