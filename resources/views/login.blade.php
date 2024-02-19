<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/loginavatar.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login</title>
</head>

<body class="d-flex flex-column">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Successfuly registered!</strong> Please wait until we finished setting your RFID and account.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('not_logged_in'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Login first!</strong> {{ session()->get('not_logged_in') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                
                <img src="/images/main-logo.png"  alt="logo">
            </div>
            <div class="login-card-header">
                <h1>LOGIN as</h1>
            </div>
            <form class="login-card-form" action="{{ route('submit-login') }}" method="post">
                @csrf
            <select class="form-select" name="type" id="type">
                    <option disabled>Select login type</option>
                    <option {{ old('type') == 'Student'? 'selected' : '' }}>Student</option>
                    <option {{ old('type') == 'Faculty'? 'selected' : '' }}>Faculty</option>
                    <option {{ old('type') == 'Staff'? 'selected' : '' }}>Staff</option>
                    <option {{ old('type') == 'Admin'? 'selected' : '' }}>Admin</option>
                </select>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" name="email" placeholder="Enter Email" id="emailForm" 
                    autofocus required>
                    @error('login_err')
                        <span class="error text-danger"> {{ $message }}</span>
                    @enderror

                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="password" placeholder="Enter Password" id="passwordForm"
                     required>
                </div>

                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer" id="signup">
            </div>
        </div> 
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            } 
            
            var selected = $("#type").find(":selected").val();
            if(selected == "Student"){
                $("#signup").html("<span class='text'><h6>Not a member?<a href='{{ route('student-signup') }}' class='text signup-link'> Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h6></span>");
            }
            else if(selected == "Faculty"){
                $("#signup").html("<span class='text'><h6>Not a member? <a href='{{ route('professor-signup') }}' class='text signup-link'> Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h6></span>");
            }
            else {
                $("#signup").html("<span class='text'><h5><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h5></span>");
            }


            $("#type").change(function(){
                var selected = $(this).find(":selected").val();

                if(selected == "Student"){
                    $("#signup").html("<span class='text'><h6>Not a member?<a href='{{ route('student-signup') }}' class='text signup-link'> Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h6></span>");
                }
                else if(selected == "Faculty"){
                    $("#signup").html("<span class='text'><h6>Not a member? <a href='{{ route('professor-signup') }}' class='text signup-link'> Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h6></span>");
                }
                else {
                    $("#signup").html("<span class='text'><h6><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></h6></span>");
                }
                
            });
        });
    </script>
</body>

</html>