<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    <title>Student Login</title>
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
                <span class="title">Student Login</span>
                <form action="{{ route('student-login') }}" method='post'>
                    @csrf 
                    <div class="input-field">
                        <input type="text" name='email' placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" class="password" id="myInput" placeholder="Enter your password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw" type="checkbox" onclick="myFunction()"></i>
                    </div>

                        @error('login_err')
                            <span class='text-danger'>{{ $message }}</span>
                        @enderror

                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="{{ route('student-signup') }}" class="text signup-link">Signup Now</a> <br>
                        <a href="{{ route('home') }}" class="text signup-link">Back to Home</a>
                    </span>
                </div>
            </div>

           
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/js/Loginjs.js"></script>
    <script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
    
</body>
</html>

