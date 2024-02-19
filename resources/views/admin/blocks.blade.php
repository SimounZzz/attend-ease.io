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
        /* .sb-sidenav-footer
        {
            background-color:   #001133 !important;
        } */
        
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
                <main class="p-1">
                    <div class="container-fluid row">
                        <div class="col-xl-12 mb-3">
                            <h1 class="mt-4">Data on Blockchain</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">View and upload files that is on blockchain.</li>
                                </ol>
                        </div>

                        <div class="col-xl-6 mb-3 shadow rounded p-3">
                            <form>
                                <div class="col-xl-10 mb-3">
                                    <h4>Upload file to Blockchain</h4>
                                    <hr>
                                    <label for="block_select"><small class="fw-bold">Location</small></label>
                                    <select class="form-select" name="block_select" id="block_select" required>
                                        <option disabled selected>Select location</option>
                                        @foreach($locations as $loc)
                                            <option>{{ $loc -> loc }}</option>
                                        @endforeach
                                    </select>
                    
                                </div>

                                <div class="col-xl-10 mb-3">
                                    <input type="file" class="form-control" name="inp_pdf" id="inp_pdf" required>
                                </div>

                                <div class="col-xl-10">
                                    <p id="status_text"></p>
                                    <input type="submit" class="btn btn-outline-primary" value="Upload to Blockchain">
                                </div>
                                
                            </form>
                        </div>

                        <div class="col-xl-12 table-responsive shadow rounded p-3 mb-3">
                            <table id="blocksTable" class="table table-hover">
                                <thead>
                                        <th><small>SID</small></th>
                                        <th><small>Location</small></th>
                                        <th><small>Filename</small></th>
                                        <th><small>Hash</small></th>
                                    </tr>
                                </thead>
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
        

        <script>
             
        </script>
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
        <script src="/js/submenu.js"></script>
        <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
        <script src="/js/randomGenerator.js"></script>
        <script>
                var blocks = JSON.parse('{!! json_encode($blocks) !!}');
                var blocksTable = $('#blocksTable').DataTable();

                $("#block_select").on("change", function() {
                    blocksTable.clear().draw();
                    blocks.forEach(function (item) {
                        if($("#block_select").val() == item.location){
                            blocksTable.row.add($(`<tr><small><td>${item.sid}</td></snall><small><td>${item.location}</td></snall><small><td>${item.filename}</td></snall><small><td><a class="view_file" data-sid='${item.sid}' data-filename='${item.filename}' href='#view-file'>${item.hash}</a></td></snall></tr>`)).draw(false);
                        }

                    });
                });

                $("#block_select").trigger("change");

                $(document).on('click', '.view_file',function(e){
                    e.preventDefault();
                    var sid = $(this).data('sid');
                    var filename = $(this).data('filename');
                    read(sid, filename);
                    
                });

                async function read(sid, filename){
                    const {ethereum} = window;
                    if(ethereum) {
                        const provider = new ethers.providers.Web3Provider(ethereum);
                        await provider.send("eth_requestAccounts", []);
                        const signer = provider.getSigner();
                        const response = await fetch('/json/NfcABI.json');
                        const abi = await response.json();
                        const contract = new ethers.Contract(
                        "0x40c8D36425116DcFBd246fBd0813EcCd8F5d82FE",
                        abi,
                        signer);
                        const cid = await contract.getDataInId(sid);
                        if(cid){
                            const url = `https://${cid}.ipfs.nftstorage.link/${filename}`;
                            window.open(url, "_blank");
                        }
                    }
                }

            $(document).ready(function () {
                var status_text = $("#status_text");

                try {
                    const apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDIzN2REYWE3NWUyMjk4OGU1YzE1MkMxNkQ5RUVDQmIyOWZlMzY0ODIiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY4MzcxOTMwNjY0OSwibmFtZSI6IkZpbGVzIn0.FV9ztJm4-lbvc7eCaQ2zXDmG6uGEuq16DrlV_owfMos';
                    const form = document.querySelector('form');
                    const fileInput = document.querySelector('#inp_pdf');
                    form.addEventListener('submit', async (event) => {
                    status_text.html("Sending the file to Blockchain...");
                    status_text.toggleClass("text-primary");
                    event.preventDefault();
                
                    const file = fileInput.files[0];
                    const formData = new FormData();
                    formData.append('file', file);
                
                    const response = await fetch('https://api.nft.storage/upload', {
                        method: 'POST',
                        headers: {
                        'Authorization': `Bearer ${apiKey}`
                        },
                        body: formData
                    });
                    const data = await response.json();
                    const cid = `${data.value.cid}`;
                    const{ethereum} = window;
                    if(ethereum){
                        const provider = new ethers.providers.Web3Provider(ethereum);
                        await provider.send("eth_requestAccounts", []);
                        const signer = provider.getSigner();
                        const response = await fetch('/json/NfcABI.json');
                        const abi = await response.json();
                        const contract = new ethers.Contract(
                            "0x40c8D36425116DcFBd246fBd0813EcCd8F5d82FE",
                            abi,
                            signer
                        );

                        const sid = generateRandomString(10);
                        let location = $("#block_select").val();
                        let tx = await contract.setFileToBlock(sid, cid);
                        const receipt = await tx.wait();

                        if(receipt.status == 1){
                            $.post("{{ route('admin-upload-block') }}",
                                {
                                    '_token': $('meta[name=csrf-token]').attr('content'),
                                    'sid': sid,
                                    'location': location,
                                    'filename': file.name,
                                    'hash': tx.hash,
                                }, function(response){
                                    if(!response.upload_err){
                                        $("#status_text").toggleClass("text-success");
                                        $("#status_text").html(response.filename + " was successfully added to Blockchain!");
                                    }
                                    else {
                                        $("#status_text").toggleClass("text-danger");
                                        $("#status_text").html(response.filename + " was not added to Blockchain!");
                                    }
                                
                                });
                        }
                        else {
                            alert("Non-Ethereum Browser, Please check your Metamask and try again.");
                        }
                    }
                    else {
                        $("#status_text").toggleClass("text-danger");
                        $("#status_text").html("Something's Wrong!");
                    }
                    });
                }
                catch(error){
                    status_text.toggleClass("text-primary");
                    status_text.toggleClass("text-danger");
                    $("#status_text").html("Something went wrong!");
                }

        });
            
        </script>  
    </body>
</html>
