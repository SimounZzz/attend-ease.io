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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
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
                            <div class="col-xl-6">
								<h1 class="mt-4">Attendance</h1>
									<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active">View your Student attedances in every class</li>
									</ol>
							</div>
                        </div>  <!-- end row div -->

                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <div class="col-md-12">
                                    <br>
                                    <span class="fw-bold mb-1">Class Name<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Class Name" data-bs-html="true" data-bs-content="<b>Dropdown Menu:</b> It allows you to view the attendance of the selected class."><i class="bi bi-info-circle"></i></a></span>
                                    <select class="form-select" name="class_list" id="class_list">
                                        <option disabled>Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class -> id }}">{{ $class -> class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-4 row mb-3">
                                <span class="fw-bold">Filter by Date<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Filter by Date" data-bs-html="true" data-bs-content="<b>Filtering:</b> You can filter the data on the table given on the selected minimum (from) and maximum (to) date."><i class="bi bi-info-circle"></i></a></span>
                                <div class="col-xl-6">
                                    <span>Minimum date</span> 
                                    <input type="text" class="form-control" id="min" name="min">
                                </div>

                                <div class="col-xl-6">
                                    
                                    <span>Maximum date</span>
                                    <input type="text" class="form-control" id="max" name="max">
                                </div>
                            </div>

                            <div class="col-xl-3 mb-3">
                                <br>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <span class="fw-bold">Attendance Summary<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Attendance Summary" data-bs-html="true" data-bs-content="<b>View Absences:</b> You can view the absents from the selected date and class."><i class="bi bi-info-circle"></i></a></span>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="button" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#absent">View Absences</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2">
                                <br>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <span class="fw-bold mt-2 align-middle">Live View<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Attendance Live View" data-bs-html="true" data-bs-content="<b>Live View:</b> You can view the attendance of your students in real-time."><i class="bi bi-info-circle"></i></a></span>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <a class="btn btn-outline-secondary w-100" href="{{ route('latest-log') }}" target="_blank" rel="noopener noreferrer">View</a>
                                </div>
                            </div>

                            <div class="col-xl-12 table-responsive">
                                <table class="table table-hover" id="student_class">
                                    <thead>
                                        <tr>
                                            <th><small>Student number</small></th>
                                            <th><small>Fullname</small></th>
                                            <th><small>Class</small></th>
                                            <th><small>Location</small></th>
                                            <th><small>Time-in</small></th>
                                            <th><small>Time-out</small></th>
                                            <th><small>Date updated</small></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
<!-- 
                            <div class="col-xl-12">
                                <h4>Absents here</h4>
                                <table class="table table-hover" id="student_class">
                                    <thead>
                                        <tr>
                                            <th>Student number</th>
                                            <th>Fullname</th>
                                            <th>Section</th>
                                            <th>Location</th>
                                            <th>Time-in</th>
                                            <th>Time-out</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div> -->


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
        <div class="modal fade" id="absent" tabindex="-1" aria-labelledby="absent" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #001033;">
                    <h1 class="modal-title fs-5 text-white" id="absent_title">View Absences</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body p-4">
                        <form action="{{ route('professor-absents') }}" method="post">
                            @csrf
                            <input type="hidden" name="faculty_id" value="{{ session()->get('id') }}">
                            <div class="row">
                                <div class="col-xl-4">
                                    <span class="fw-bold mb-1">Select Class</span>
                                    <select class="form-select" name="absent_class" id="absent_class">
                                        <option disabled selected>Select class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class -> id }}">{{ $class -> class_name }}</option>
                                        @endforeach
                                    </select>

                                    <span class="fw-bold mb-1">Choose date</span>
                                    <input type="date" class="form-control" name="absent_date" id="absent_date" required>
                                </div>
                                <div class="col-xl-12">
                                    <br>
                                    <span class="fw-bold mb-1">Absents</span>
                                        <div class="table-responsive" id="absent_list">
                                            <table class="table table-hover" id="absents_table">
                                                <thead>
                                                    <tr>
                                                        <th><small>#</small></th>
                                                        <th><small>Student Number</small></th>
                                                        <th><small>Name</small></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/moreInfo.js"></script>

        <script>
            var students_with_class = JSON.parse('{!! json_encode($students_with_class) !!}');
            // console.log(students_with_class);

            var minDate, maxDate;
            // Custom filtering function which will search data in column five between two values
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date(data[6]);

                    // console.log("MIN: " + min);
                    // console.log("MAX: " + max);
                    // console.log("DATE: " + date);

                    if (
                        ( min === null && max === null ) ||
                        ( min === null && date <= max ) ||
                        ( min <= date   && max === null ) ||
                        ( min <= date   && date <= max )
                    ) {
                        return true;
                    }
                    return false;
                }
            );

            $(document).ready( function(){
                // Create date inputs
                 minDate = new DateTime($('#min'), {
                    format: 'YYYY-MM-DD'
                });
                maxDate = new DateTime($('#max'), {
                    format: 'YYYY-MM-DD'
                });

                // DataTables initialisation
                var table = $('#student_class').DataTable({
                    order: [[4, 'desc']],
                });
            
                // Refilter the table
                $('#min, #max').on('change', function () {
                    table.draw(false);
                });
                const data = [];
                table.clear().draw();
                students_with_class.forEach(function (item) {
                        if( $( "#class_list").val() == item.class_id){
                            table.row.add($("<tr><td>" + item[0].identity_number + "</td><td>" + item[0].name + "</td><td>"+ item[0].section +"</td><td>"+ item[0].location +"</td><td>"+ item[0].time_in +"</td><td>"+ item[0].time_out +"</td><td>"+ item[0].updated_at.substring(0, 10) +"</td></tr>")).draw(false);
                        }
                    });

                $( "#class_list").on( "change", function() {
                    $( "#class_list").val()
                    table.clear().draw();
                    students_with_class.forEach(function (item) {
                        if( $( "#class_list").val() == item.class_id){
                            table.row.add($("<tr><td>" + item[0].identity_number + "</td><td>" + item[0].name + "</td><td>"+ item[0].section +"</td><td>"+ item[0].location +"</td><td>"+ item[0].time_in +"</td><td>"+ item[0].time_out +"</td><td>"+ item[0].updated_at.substring(0, 10) +"</td></tr>")).draw(false);
                        }
                    });
                });
            });
            var absents_table = $('#absents_table').DataTable();
            $("#absent_class").trigger("change");

            $("#absent_class, #absent_date").change(function (e) {
                var absent_class = $("#absent_class").val();
                // var date = new Date($('#absent_date').val());
                var date = $('#absent_date').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{ route('professor-absents') }}",
                    data: {'absent_date': date, 'absent_class': absent_class},
                    success: function (data) {
                        absents_table.clear().draw();
                        $.each(data, function(index, value) {
                            absents_table.row.add($("<tr><td>"+ index +"</td><td>" + value.student_number + "</td><td>" + value.lname + ' ' + value.fname + ' ' +value.mname + "</td></tr>")).draw(false);
                        });
                    },
                    error: function (data) {
                        absents_table.clear().draw();
                        console.log("Failed");
                    }
                });
            });
        </script>
    </body>
</html>
