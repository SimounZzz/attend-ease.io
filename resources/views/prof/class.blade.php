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
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">
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
								<h1 class="mt-4">Classes</h1>
									<ol class="breadcrumb mb-4">
										<li class="breadcrumb-item active">Manage your Classes</li>
									</ol>
							</div>

                            @if(session()->has('add_success'))
                                <div class="col-xl-4 row pt-2 pe-1 pb-5">
                                    <div class="alert alert-success alert-dismissible fade show text-black" role="alert">
                                    <i class="fa-solid fa-circle-check text-success"></i>
                                        {{ session()->get('add_success') }}
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
                            <div class="col-xl-4 mb-3">
                                <form action="{{ route('professor-add-class') }}" method="post">
                                    @csrf
                                    <h4>Add Class<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Add Class" data-bs-html="true" data-bs-content="<b>Add Class:</b> Allows you to add New Class. Following the format: Section-Subject Code (Ex. 4-CPE-A MAT101)."><i class="bi bi-info-circle"></i></a></h4>
                                    <hr>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="faculty_id" value="{{ session()->get('id') }}">
                                        <input type="text" class="form-control" name="class_name" placeholder="4CPE-A-MAT101" required>
                                        <input type="submit" class="btn btn-outline-success" value="Submit Class">
                                    </div>
                                </form>
                            </div>
       
                            <div class="col-xl-12">
                                <h4>Add Student to Class<a tabindex="0" class="align-middle btn btn-link btn-sm shadow-none" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Add Student to Class" data-bs-html="true" data-bs-content="<b>Add Student to Class:</b> You can add students based to your selected class.<hr>
                                <b>Dropdown Menu:</b> You can select which class to add students on.<hr>
                                <b>Check Selected Students:</b> Gives a view on the current selected students.<hr>
                                <b>Clear Selected:</b> Clears currently selected students from the selection.<hr>
                                <b>Add Selected Students:</b> Add currently selected students to the selected class."><i class="bi bi-info-circle"></i></a></h4>
                                <hr>

                                <div class="d-flex flex-row">
                                    <div class="me-3">
                                        <select class="form-select" name="selected_class" id="selected_class">
                                            <option disabled>Select class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class -> id }}">{{ $class -> class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="me-3">
                                        <button class="btn btn-secondary p-2" id="button">Check Selected Students</button>

                                    </div>

                                    <div class="me-3">
                                        <button class="btn btn-danger p-2" id="clear-selected">Clear Selected</button>
                                    </div>

                                    <div class="me-3">
                                        <a href='' class="btn btn-success p-2" id="add-selected" onclick="submitForm(event)">Add selected students</a>
                                    </div>
                                </div>
                                <hr>

                                
                                <div class="col-md-3">
                                    <h5>Student list</h5>
                                    <hr>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="studentTable" class="table table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><small>Student number</small></th>
                                                <th><small>Fullname</small></th>
                                                <th><small>Year level</small></th>
                                                <th><small>Department</small></th>
                                                <th><small>Course</small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <small><td>{{ $student -> student_number }}</td></small>
                                                    <small><td>{{ $student -> lname . ' ' . $student -> fname . ' ' . $student -> mname }}</td></small>
                                                    <td><small>{{ $student -> ylevel }}</small></td>
                                                    <td><small>{{ $student -> dep }}</small></td>
                                                    <td><small>{{ $student -> course }}</small></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/moreInfo.js"></script>
        <script>
            $(document).ready(function () {
                var table = $('#studentTable').DataTable({
                    select: {
                        style: 'multi'
                    },
                    dom: 'Blfrtip',
                    buttons: [
                        'selectAll',
                        'selectNone'
                    ],
                    language: {
                        buttons: {
                            selectAll: "Select all items",
                            selectNone: "Select none"
                        }
                    }
                });

                $('#studentTable tbody').on('click', 'tr', function() {
                    $(this).toggleClass('selected');
                    var rowData = table.rows('.selected').data();
                    var id_list = [];
                    for(var i = 0; i < rowData.length; i++){
                        id_list[i] = rowData[i][0];
                        
                    }
                    var class_id = $("#selected_class").val();
                    if(id_list.length > 0){
                        $('#add-selected').attr('href', "{{ route('professor-add-students') }}?student_id=" + id_list.join(',') + "&class_id="+class_id);
                    }
                });

                $("#selected_class").change(function(){
                    var rowData = table.rows('.selected').data();
                    var id_list = [];
                    for(var i = 0; i < rowData.length; i++){
                        id_list[i] = rowData[i][0];
                        
                    }
                    var class_id = $("#selected_class").val();
                    if(id_list.length > 0){
                        $('#add-selected').attr('href', "{{ route('professor-add-students') }}?student_id=" + id_list.join(',') + "&class_id="+class_id);
                    }
                });
            
                $('#button').click(function() {
                    var rowData = table.rows('.selected').data();
                    var id_list = [];
                    var name_list = [];
                    for(var i = 0; i < rowData.length; i++){
                        id_list[i] = rowData[i][0];
                        name_list[i] = rowData[i][1];
                    }
                    alert("Selected students: " + name_list);
                });

                $('#clear-selected').click(function(){
                    table.rows().deselect();
                    $('#add-selected').attr('href', "");
                });
               
            });
        </script>

<script>
        function submitForm(e){
            if(!confirm('Are you sure you want to add selected students?')){
                e.preventDefault();
            }
        }
    </script>
    </body>
</html>
