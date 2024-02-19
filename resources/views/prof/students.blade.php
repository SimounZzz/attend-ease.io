<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('professor-home')}}">
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
                            <a class="nav-link" href="{{route('professor-home')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                            </a>

                            <a class="nav-link" href="{{route('professor-request')}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-circle-exclamation"></i></div>
                            Request
                            </a>


                            <a class="nav-link" href="{{route('professor-attendance')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                                Attendance
                            </a>

                            <a class="nav-link" href="{{ route('professor-student') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                                Students
                            </a>

                            <a class="nav-link" href="{{route('professor-class')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users-rectangle fa-xs"></i></div>
                                Manage Class
                            </a>

                            <a class="nav-link" href="{{route('professor-profile')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card fa-sm"></i></div>
                                Profile
                            </a>

                            <a class="nav-link" href="{{route('logout')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></div>
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
                            <div class="col-xl-8">
								<h1 class="mt-4">Student list</h1>
									<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active">View your Students in every class</li>
									</ol>
							</div>

                            
                            @if(session()->has('send_message_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('send_message_success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            @error('send_message_err')
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{{ $message }}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @enderror
                            
                        </div>  <!-- end row div -->

                        <div class="row">
                            <div class="col-xl-8 mb-3">
                                <div class="col-md-5">
                                    <h4>Class name</h4>
                                    <select class="form-select" name="class_list" id="class_list">
                                        <option disabled>Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class -> id }}">{{ $class -> class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-4 mb-3">
                           
                                    <label for="send-message" class="fw-bold">Send Message to Class<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Send Message to Class" data-bs-html="true" data-bs-content="<b>Send Message:</b> Allows you to send specific messages for the selected class."><i class="bi bi-info-circle"></i></a></label>
                                    <br>
                                    <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#send_message_modal" name="send-message">Send Message</button>
                                    
                           
                            </div>

                            <div class="col-xl-12 table-responsive">
                                <table class="table table-hover" id="student_class">
                                    <thead>
                                        <tr>
                                            <th><small>Student Number</small></th>
                                            <th><small>Fullname</small></th>
                                            <th><small>Year level</small></th>
                                            <th><small>Department</small></th>
                                            <th><small>Course</small></th>
                                            <th><small>History</small></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div> <!-- end row div -->
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

        <!-- Modal -->
        <form action="" method="post">
            @csrf
            <input type="hidden" name="faculty_id_modal" value="{{ session()->get('id') }}">
            <div class="modal fade" id="send_message_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header" style="background-color: #001033;">
                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Send Message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-xl-8 mb-2">
                                    <div class="col-xl-12">
                                        <label for="class_list_modal" class="fw-bold">Which class?</label>
                                        <select class="form-select" name="class_list_modal" id="class_list_modal">
                                            <option disabled>Select class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class -> id }}">{{ $class -> class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12 mb-2">
                                    <label for="subject_modal" class="fw-bold">Subject</label>
                                    <input type="text" class="form-control" name="subject_modal" id="" placeholder="Ex. Exam Schedule" required>
                                </div>

                                <div class="col-xl-12">
                                    <label for="message_modal" class="fw-bold">Message</label>
                                    <textarea class="form-control" name="message_modal" id="message_modal" cols="30" rows="5" placeholder="Ex. List of schedules of exams." required></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-outline-primary" value="Send">
                        </div>
                    </div>
                </div>
            </div>
        </form>


         <!-- Modal -->
        <div class="modal fade" id="view_hist_modal" tabindex="-1" aria-labelledby="absent" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #001033;">
                    <h1 class="modal-title fs-5 text-white" id="absent_title">Student History</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body p-4" id="hist_modal_body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/moreInfo.js"></script>

        <script>
            var students_with_class = JSON.parse('{!! json_encode($students_with_class) !!}');
            // console.log(students_with_class);

            var table = $('#student_class').DataTable();

            $(document).ready( function(){
                const data = [];
                table.clear().draw();
                students_with_class.forEach(function (item) {
                        if( $( "#class_list").val() == item.class_id){
                            table.row.add($("<tr><td>" + item[0].student_number + "</td><td>" + item[0].lname + " " + item[0].fname + " " + item[0].mname + "</td><td>" + item[0].ylevel + "</td><td>" + item[0].dep + "</td><td>" + item[0].course + "</td><td><button type='submit' class='btn btn-outline-secondary btn-sm view-history' data-id='"+ item[0].student_number +"'>View</button></form></td></tr>")).draw();
                        }
                    });

                $( "#class_list").on( "change", function() {
                    $( "#class_list").val()
                    table.clear().draw();
                    students_with_class.forEach(function (item) {
                        if( $( "#class_list").val() == item.class_id){
                            table.row.add($("<tr><td>" + item[0].student_number + "</td><td>" + item[0].lname + " " + item[0].fname + " " + item[0].mname + "</td><td>" + item[0].ylevel + "</td><td>" + item[0].dep + "</td><td>" + item[0].course + "</td><td><button class='btn btn-outline-secondary btn-sm view-history' data-id='"+ item[0].student_number +"'>View</button></form></td></tr>")).draw();
                        }
                    });
                });

                $(document).on("click",".view-history",function(e){
                    var student_number = $(this).data('id');
                    var class_id = $("#class_list").val();
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    e.preventDefault();
                    $.ajax({
                        type: "GET",
                        url: "{{ route('professor-history') }}",
                        data: {'student_number': student_number, "class_id": class_id},
                        success: function (data) {
                            $("#hist_modal_body").html(data);
                            $('#view_hist_modal').modal('show'); 
                        },
                        error: function (data) {
                            console.log("Failed");
                        }
                    });
                });
            });
        </script>
    </body>
</html>
