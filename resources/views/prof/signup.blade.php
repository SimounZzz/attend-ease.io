<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!----======== CSS ======== -->
    <!-- <link rel="stylesheet" href="/css/Signup.css"> -->
     
    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <style>
    body {
        font-family: "Gill Sans", sans-serif;
        background: linear-gradient(to right, #001033, #001033);
    }

    .col-xl-4 {
        margin-bottom: 0.5rem;
    }
</style>

    <title>Faculty Regisration </title> 
</head>
<body class="p-5">
    <div class="container bg-white shadow rounded p-5 mt-5">
    <div class="col-md-6">
            <h3>Faculty Registration</h3>
            <div class="col-md-8">
                <hr style="border: 2px solid #001033; border-radius: 1px;">
            </div>
        </div>

        <form action="{{ route('professor-submit-signup') }}" method='post'>
            @csrf
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">EMPLOYEE NUMBER</small>
                                <input type="text" class="form-control" name='identity_number' placeholder="Enter ID Number" value="{{ old('identity_number') }}" required>
                                @error('id_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">LAST NAME</small>
                                <input type="text" class="form-control text-only" name='lname' placeholder="Enter last name" value="{{ old('lname') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                 <small class="text-muted">FIRST NAME</small>
                                <input type="text" class="form-control text-only" name='fname' placeholder="Enter first name" value="{{ old('fname') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                  <small class="text-muted">MIDDLE NAME</small>
                                <input type="text" class="form-control text-only" name='mname' placeholder="Enter middle name" value="{{ old('mname') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                 <small class="text-muted">SEX</small>
                                <select class="form-select" name='sex' required>
                                    <option disabled>Select Sex</option>
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                 <small class="text-muted">DATE OF BIRTH</small>
                                <input type="date" class="form-control" name='birthdate' placeholder="Enter birth date" value="{{ old('birthdate') }}" required>
                                 @error('birthdate_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">EMAIL</small>
                                <input type="email" class="form-control" name='email' placeholder="Enter your email"  value="{{ old('email') }}"required>
                                @error('email_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">MOBILE NUMBER</small>
                                <input type="number" class="form-control" name='contact' placeholder="Enter mobile number" value="{{ old('contact') }}" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">PASSWORD</small>
                                <input type="password" class="form-control" name='password' placeholder="Enter password" minlength="8" required>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="">
                                 <small class="text-muted">CONFIRM PASSWORD</small>
                                <input type="password" class="form-control" name='confirm' placeholder="Confirm password" minlength="8" required>
                                @error('pass_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4 mb-3">
                            <div class="">
                                <small class="text-muted">DEPARTMENT</small>
                                <select class="form-select" required id="department" name='dep'>
                                    <option disabled>Select Department</option>
                                    <option>College of Arts and Sciences</option>
                                    <option>College of Business, Accountancy and Administration</option>
                                    <option>College of Computing Studies</option>
                                    <option>College of Education</option>
                                    <option>College of Engineering</option>
                                    <option>College of Health and Allied Sciences</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-3">
                            <div class="">
                                <small class="text-muted">PHOTO OF YOU (White Background)</small>
                                <input type="file" class="form-control" id="picture" name ="picture" class='picture' placeholder="Upload file" accept="image/*" required>
                                @error('pic_err')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>


                <div class="form-check">
                <small class="text-muted"> <a href="https://www.privacy.gov.ph/data-privacy-act/">Data Privacy Act</a> </small>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                 <label class="form-check-label" for="flexCheckDefault">
                                        I confirm that the personal data provided herein
                                are true and correct, and that I also acknowledge that personal information
                                will be treated with utmost confidentiality. Futher, I am giving the Researcher
                                a consent to use all necessary personal data about me for the purpose of this
                                research
                                  </label>
                </div>

                <div class="row mt-3 justify-content-end">
                    <div class="col-md-2">
                        <a class="btn btn-primary w-100 mb-2" href="{{ route('login') }}">Back</a>
                    </div>

                    <div class="col-xl-2">
                        <button class="btn btn-success w-100" id='submit_form' type="submit" onclick="submitForm(event)" value="Submit">Submit
                        </button> 
                    </div>    
                </div> 

                </div> 
            </div>
        </form>
    </div>

    <script src="Signup.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
        function submitForm(e){
            if(!confirm('Are all information correct?')){
                e.preventDefault();
            }
        }

        function alphaOnly(event) {
                var value = String.fromCharCode(event.which);
                var pattern = new RegExp(/[a-zA-Z ]/i);
                return pattern.test(value);
            }

            $('.text-only').bind('keypress', alphaOnly);
    </script>
</body>
</html>
