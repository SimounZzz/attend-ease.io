<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Signup</title>
    <link rel="icon" type="image/x-icon" href="/images/main-logo.png">
    
    <!----======== CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/css/Signup.css"> -->
    
     
    <!----===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<style>
    body {
        font-family: "Gill Sans", sans-serif;
        background: linear-gradient(to right, #001033, #001033);
    }

    .col-xl-4 {
        margin-bottom: 0.5rem;
    }
</style>
<body class="p-5">
    <div class="container bg-white shadow rounded p-5 mt-5">
        <div class="col-md-6">
            <h3>Student Registration</h3>
            <div class="col-md-8">
                <hr style="border: 2px solid #001033; border-radius: 1px;">
            </div>
        </div>
        
        <form action="{{ route('student-submit-signup') }}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">STUDENT NUMBER</small>
                                <input type="text" class="form-control" name='studentnumber' id="studentnumber" placeholder="Enter student number" value="{{ old('studentnumber') }}" required>
                                @error('id_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">LAST NAME</small>
                                <input type="text" class="form-control text-only"  name='lastname' id="lastname" placeholder="Enter last name" value="{{ old('lastname') }}" maxlength="50" minlength="2" required>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">FIRST NAME</small>
                                <input type="text" class="form-control text-only" name='firstname' id="firstname" placeholder="Enter first name" value="{{ old('firstname') }}" maxlength="50" minlength="2" required>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">MIDDLE NAME</small>
                                <input type="text" class="form-control text-only" name='middlename' id="middlename" placeholder="Enter middle name" value="{{ old('middlename') }}" maxlength="50" minlength="2" required>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">SEX</small>
                                <select  class="form-select" id="sex" name='sex' required>
                                    <option disabled>Select sex</option>
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">DATE OF BIRTH</small>
                                <input type="date" class="form-control" name='birthdate' id="birthdate" placeholder="Enter birth date" value="{{ old('birthdate') }}" required>
                                 @error('birthdate_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">EMAIL</small>
                                <input type="email" class="form-control" name='email' id="email" placeholder="Enter your email" value="{{ old('email') }}" maxlength="50" minlength="5" required>
                                @error('email_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">MOBILE NUMBER</small>
                                <input type="text" class="form-control num-only" name='mobile' id="mobile" placeholder="Enter mobile number" value="{{ old('mobile') }}" maxlength="11" minlength="11" required>
                            </div>   
                        </div>
  
                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">PASSWORD</small>
                                <input type="password" class="form-control" name='password' id="password" placeholder="Enter password" minlength="8" required>
                            </div>   
                        </div>

                        <div class="col-xl-4">
                            <div class=" ">
                                <small class="text-muted">CONFIRM PASSWORD</small>
                                <input type="password" class="form-control" name='confirm' id="confirm" placeholder="Confirm password" minlength="8" required>
                                @error('pass_err')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class=" ">
                            <small class="text-muted">YEAR LEVEL</small>
                            <select  class="form-select" name='level' id="level" placeholder="Enter year level" required>
                                    <option disabled>Select Year</option>
                                    <option>Grade 11</option>
                                    <option>Grade 12</option>
                                    <option>1st</option>
                                    <option>2nd</option>
                                    <option>3rd</option>
                                    <option>4th</option>
                                    <option>5th</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">DEPARTMENT</small>
                                <select  class="form-select" name='department' id="department" required>
                                    <option disabled>Select Department</option>
                                    <option>PNC-SHS</option>
                                    <option>CI-TECH</option>
  
                                </select>
                            </div>
                        </div>

                       
                        <div class="col-xl-4">
                            <div class="">
                                <small class="text-muted">COURSE</small>
                                <select class="form-control" name='course' id="course" required>
                                    <option disabled>Select course</option>
                                    <option>STEM</option>
                                    <option>HUMSS</option>
                                    <option>ABM</option>
                                    <option>TVL</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-4 mb-3">
                            <div class="">
                                <small class="text-muted">REGISTRATION FORM</small>
                                <input type="file" class="form-control" id="registration" name ="registration" class='registration' placeholder="Upload file" accept="application/pdf" required>
                                @error('file_err')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
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
                         <small class="text-muted"> <a href="https://www.privacy.gov.ph/data-privacy-act/" target="_blank" rel="noopener noreferrer">Data Privacy Act</a> </small>
                                 <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                 <label class="form-check-label text-justify" for="flexCheckDefault">
                                        I confirm that the personal data provided here in
                                are true and correct, and that I also acknowledge that personal information
                                will be treated with utmost confidentiality. Further, I am giving the Researcher
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
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/js/Signup.js"></script>

    <script>
        function submitForm(e){
            if(!confirm('Are all information correct?')){
                e.preventDefault();
            }
        }
        $(document).ready(function(){
            $("#department").trigger("change");

            $("#level").change(function(){
                var selected = $(this).find(":selected").val();
                if(selected == "Grade 11" || selected == "Grade 12"){
                    $("#department").html("<option disabled>Select Department</option><option>PNC-SHS</option><option>CI-TECH</option>");
                    $("#department").trigger("change");
                }
                else {
                    $("#department").html("<option disabled>Select Department</option><option>College of Arts and Sciences</option><option>College of Business, Accountancy and Administration</option><option>College of Computing Studies</option><option>College of Education</option><option>College of Engineering</option><option>College of Health and Allied Sciences</option>");
                    $("#department").trigger("change");
                }
 
            });

            $("#department").change(function(){
                var selected = $(this).find(":selected").val();
                if(selected == "College of Arts and Sciences"){
                    $("#course").html("<option disabled>Select course</option><option>BS in Psychology</option>");
                }
                else if(selected == "College of Business, Accountancy and Administration"){
                    $("#course").html("<option disabled>Select course</option>                                <option>BS in Accountancy</option><option>BS in Business Administration major in Financial Management</option><option>BS in Business Administration major in Marketing Management</option>");
                }
                else if(selected == "College of Computing Studies"){
                    $("#course").html("<option disabled>Select course</option>                                <option>BS in Computer Science</option><option>BS in Information Technology</option>");
                }
                else if(selected == "College of Education"){
                    $("#course").html("<option disabled>Select course</option>                                 <option>Bachelor of Elementary Education</option><option>Bachelor of Secondary Education major in English</option><option>Bachelor of Secondary Education major in Filipino</option><option>Bachelor of Secondary Education major in Mathematics</option><option>Bachelor of Secondary Education major in Social Studies</option>");
                }
                else if(selected == "College of Engineering"){
                    $("#course").html("<option disabled>Select course</option><option>BS in Computer Engineering</option><option>BS in Electronics Engineering</option><option>BS in Industrial Engineering</option>");
                }
                else if(selected == "College of Health and Allied Sciences"){
                    $("#course").html("<option disabled>Select course</option><option>BS in Nursing</option>");
                }
                else if(selected == "PNC-SHS" || selected == "CI-TECH"){
                    $("#course").html("<option disabled>Select course</option><option>STEM</option><option>HUMSS</option><option>ABM</option><option>TVL</option>");
                }
                else {
                    $("#course").html("<option disabled>Select course</option>");
                }
            });


            function alphaOnly(event) {
                var value = String.fromCharCode(event.which);
                var pattern = new RegExp(/[a-zA-Z ]/i);
                return pattern.test(value);
            }

            function numOnly(event) {
                var value = String.fromCharCode(event.which);
                var pattern = new RegExp(/[0-9]/i);
                return pattern.test(value);
            }

            $('.text-only').bind('keypress', alphaOnly);
            $('.num-only').bind('keypress', numOnly);
        });

    </script>
</body>
</html>
