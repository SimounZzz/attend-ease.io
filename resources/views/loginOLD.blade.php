 

<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="/css/logincss.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>

<body>

    <div class="container">
       
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Successfuly registered!</strong> Please wait until we finished setting your RFID and account.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="forms">
        
            <div class="form login">
                <span class="title">LOGIN as</span>
                <br>
                <br>
                <form action="{{ route('submit-login') }}" method="post">
                <select class="form-select" name="type" id="type">
                    <option disabled>Select login type</option>
                    <option>Student</option>
                    <option>Faculty</option>
                    <option>Staff</option>
                    <option>Admin</option>
                </select>
              
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                
                    @error('login_err')
                        <span class="error text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="input-field">
                        <input type="password" name="password" class="password" placeholder="Enter your password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw" type="checkbox" onclick="myFunction()"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup" id="signup">
                </div>
            </div>

           
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="/js/Loginjs.js"></script>

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
            
            var selected = $(this).find(":selected").val();
                console.log(selected);

                if(selected == "Student"){
                    $("#signup").html("<span class='text'>Not a member?<a href='{{ route('student-signup') }}' class='text signup-link'>Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }
                else if(selected == "Faculty"){
                    $("#signup").html("<span class='text'>Not a member?<a href='{{ route('professor-signup') }}' class='text signup-link'>Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }
                else {
                    $("#signup").html("<span class='text'>Not a member?<a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }

            $("#type").change(function(){
                var selected = $(this).find(":selected").val();
                console.log(selected);

                if(selected == "Student"){
                    $("#signup").html("<span class='text'>Not a member?<a href='{{ route('student-signup') }}' class='text signup-link'>Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }
                else if(selected == "Faculty"){
                    $("#signup").html("<span class='text'>Not a member?<a href='{{ route('professor-signup') }}' class='text signup-link'>Signup Now</a> <br><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }
                else {
                    $("#signup").html("<span class='text'><a href='{{ route('home') }}' class='text signup-link'>Back to Home</a></span>");
                }
                
            });
        });



        </script>
</body>
</html>

