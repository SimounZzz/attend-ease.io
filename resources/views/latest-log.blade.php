<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Latest Log</title>
    <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .image-container {
        max-width: 100%;
        max-height: 100%;
        overflow: hidden;
    }
    .image-container img {
        width: 100%;
        height: auto;
    }
</style>
<body class="p-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header text-white" style="background-color: #001033;">
                        <div class="row">
                            <div class="col-xl-8 fs-4">
                                Latest Activity Log
                            </div>
                            <div class="col-xl-4">
                                <select class="form-select" name="location" id="location">
                                    @if(session()->get('role') == 'Faculty')
                                        @foreach($classes as $class)
                                            <option {{ $loop->first? 'selected' : ''}}>{{ $class->class_name }}</option>
                                        @endforeach
                                    @else
                                        @foreach($locations as $location)
                                            <option {{ $loop->first? 'selected' : ''}}>{{ $location->loc }}</option>
                                        @endforeach
                                    @endif
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 image-container">
                                <img id="log_picture" src="" alt="avatar">
                            </div>

                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="fs-3" id="log-id"></div>
                                    </li>

                                    <li>
                                        <div class="fs-3" id="log-name"></div>
                                    </li>

                                    <li>
                                        <div class="fs-3" id="log-time"></div>
                                    </li>
                                    <li>
                                        <div class="fs-3" id="log-loc"></div>
                                    </li>
                                    <hr>
                                    <li>
                                        <div class="fs-3" id="log-info"></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script>
        $(document).ready(function() {
            function get_latest_log() {
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });

                $.ajax({
                    url: "{{ route('get-latest-log') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {"location": $("#location").val()},
                    success: function(response) {
                        if (response) {
                            $('#log-id').html("ID: <strong>" + response.identity_number + "</strong>");
                            $('#log-name').html("Name: <strong>" + response.name + "</strong>");
                            var newDate = moment(new Date(response.updated_at)).format('h:mm a, MMMM Do YYYY');
                            $('#log-time').html("Timestamp: <strong>" + newDate + "</strong>");

                            if(response.location == "Room"){
                                $('#log-loc').html("Location: <strong>" + response.location + "</strong> Class: <strong>"+ response.section + "</strong>");
                            }
                            else {
                                $('#log-loc').html("Location: <strong>" + response.location + "</strong>");
                            }
                          
                            if(response.picture){
                                $("#log_picture").attr("src", response.picture);
                            }
                            else {
                                $("#log_picture").attr("src","/images/default-pic.svg");
                            }

                            if(response.time_out){
                                $('#log-info').html("Status: <strong class='text-success'>Time-out Success!</strong>");
                            }
                            else {
                                $('#log-info').html("Status: <strong class='text-success'>Time-in Success!</strong>");
                            }
                           
                        } else {
                            $('#log-id').html("ID:");
                            $('#log-name').html("Name:");
                            $('#log-time').html("Timestamp:");
                            $('#log-loc').html("Location:");
                            $('#log-info').html("Status:");
                        }
                        setTimeout(get_latest_log, 1000);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        setTimeout(get_latest_log, 1000);
                    }
                });
            }

            get_latest_log();

        });

    </script>
</body>
</html>