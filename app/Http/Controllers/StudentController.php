<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        $now = Carbon::now();
        $expiration = $now->subDays(10);
        $expiration_faculty = $now->subDays(3);
        $announcements = DB::table('announcement')->where('class_id', '')->where('type', 'Student')->orWhere('type', 'All')->where('created_at', '>=', $expiration)->get();

        $classes = DB::table('class')->join('class_members', 'class.id' , '=', 'class_members.class_id')->where('student_number', session()->get('id'))->get();
        $classes_id = array();
        foreach($classes as $class){
            array_push($classes_id, $class -> class_id);
        }
        $faculty_message = DB::table('announcement')->whereIn('class_id', $classes_id)->where('created_at', '>=', $expiration_faculty)->get();
                // $all_announcements = $announcements->merge($faculty_message)->sortKeysDesc()->values()->all();
        $all_announcements = $announcements->merge($faculty_message)->sortBy([['id', 'desc']])->values()->all();
        return view('student.dashboard', compact('all_announcements', 'data', 'classes'));
    }

    public function login(){
        return view('student.login');
    }

    public function submit_login(Request $reqeust){
       $email = $reqeust -> post('email');
       $password = $reqeust -> post('password');
       $account = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Student')->get();
       if(count($account) >= 1){
            if($account[0] -> status == '0'){
                return back()->withInput($reqeust -> all())->withErrors([
                    'login_err' => "Account hasn't been activated yet",
                ]);
            }
            else if($account[0] -> status == '1'){
                session()->put('id', $account[0] -> identity_number);
                return redirect()->route('student-home');
            }
            else if($account[0] -> status == '3'){
                return back()->withInput($reqeust -> all())->withErrors([
                    'login_err' => "Account rejected by admin.",
                ]);
            }
            else {
               return back()->withInput($reqeust -> all())->withErrors([
                   'login_err' => "Unknown error occured, please try again later.",
               ]);
            }
            
       }
       else {
            return back()->withInput($reqeust -> all())->withErrors([
                'login_err' => "Wrong email or password",
            ]);
       }
    }

    public function signup(){
        return view('student.signup');
    }

    public function profile(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        $classes = DB::table('class')->join('class_members', 'class.id', '=', 'class_members.class_id')->where('class_members.student_number', session()->get('id'))->get();
        $faculty_id = [];
        foreach($classes as $class){
            array_push($faculty_id, $class -> faculty_id);
        }
        $professor = DB::table('users')->whereIn('student_number', $faculty_id)->get();
        $class_members = DB::table('class_members')->where('student_number', session()->get('id'))->get();
        return view('student.profile', compact('data', 'classes', 'professor'));
    }

    public function logs(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        $logs = DB::table('activity_logs')->where('identity_number', session()->get('id'))->get();
        return view('student.logs', compact('logs', 'data'));
    }

    public function logout(){
        session()->flush();
        return redirect('/student/login');
    }

    public function submit_signup(Request $reqeust){
        $studentnumber = $reqeust -> post('studentnumber');
        $lastname = $reqeust -> post('lastname');
        $firstname = $reqeust -> post('firstname');
        $middlename = $reqeust -> post('middlename');
        $sex = $reqeust -> post('sex');
        $birthdate = $reqeust -> post('birthdate');
        $email = $reqeust -> post('email');
        $mobile = $reqeust -> post('mobile');
        $password = $reqeust -> post('password');
        $confirm = $reqeust -> post('confirm');
        $level = $reqeust -> post('level');
        $department = $reqeust -> post('department');
        $course = $reqeust -> post('course');

        if($password != $confirm){
            return back()->withInput($reqeust -> input())->withErrors([
                'pass_err' => "Password doesn't match",
            ]);
        }

        if($reqeust->file('registration')->extension() != "pdf"){
            return back()->withInput($reqeust -> input())->withErrors([
                'file_err' => "Reg form only accepts pdf.",
            ]);
        }

        $mimeType = $reqeust->file('picture')->getMimeType();
        if (strpos($mimeType, 'image/') !== 0) {
            return back()->withInput($reqeust -> input())->withErrors([
                'pic_err' => "File must be a image.",
            ]);
        }
        
        try {
            $parsedBirthdate = Carbon::createFromFormat('Y-m-d', $birthdate);
        } catch (\Exception $e) {
            return back()->withInput($reqeust -> input())->withErrors(['birthdate_err' => 'Invalid birthdate']);
        }
    
        if (!$parsedBirthdate || $parsedBirthdate->isFuture()) {
            return back()->withInput($reqeust -> input())->withErrors(['birthdate_err' => 'Invalid birthdate']);
        }

        $data = DB::table('users')->where('student_number', $studentnumber)->where('rejected', '0')->exists();
        $email_exists = DB::table('users')->where('email', $email)->where('status', '!=', '3')->where('rejected', '!=', '1')->exists();

        if($data){
            return back()->withInput($reqeust -> input())->withErrors([
                'id_err' => "Student number already registered",
            ]);
        }
        else if($email_exists){
            return back()->withInput($reqeust -> input())->withErrors([
                'email_err' => "Email already registered",
            ]);
        }
        else {

            $file = $reqeust->file('registration');
            $picture = $reqeust->file('picture');

            $unique_id = uniqid();
            $filename =  $unique_id . '-' .$studentnumber . '-registration_form' . '.' . $reqeust->file('registration')->extension();
            $picture_filename = $unique_id . '-' .$studentnumber . '-image' . '.' . $reqeust->file('picture')->extension();

            $filePath = base_path("/public_html/uploaded/");
            $filePath_picture = base_path("/public_html/uploaded/picture");


            $file->move($filePath, $filename);
            $picture->move($filePath_picture, $picture_filename);

            $full_file_path = "/uploaded/$filename";
            $full_file_path_picture = "/uploaded/picture/$picture_filename";
    
            date_default_timezone_set('Asia/Singapore');
            $now = date('Y-m-d H:i:s');

            DB::table('users')->insert([
                'student_number' => $studentnumber,
                'lname' => $lastname,
                'fname' => $firstname,
                'mname' => $middlename,
                'sex' => $sex,
                'birthdate' => $birthdate,
                'email' => $email,
                'contact' => $mobile,
                'ylevel' => $level,
                'dep' => $department,
                'course' => $course,
                'type' => 'Student',
                'regform' => $full_file_path,
                'picture' => $full_file_path_picture,
                'created_at' => $now
            ]);
    
            DB::table('accounts')->insert([
                'identity_number' => $studentnumber,
                'type' => 'Student',
                'email' => $email,
                'password' => $password,
                'created_at' => $now
            ]);
            return redirect()->route('login')->with('success', 'Success!');
        }
    }
}
