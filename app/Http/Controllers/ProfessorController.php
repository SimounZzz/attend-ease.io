<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;use Carbon\Carbon;

class ProfessorController extends Controller
{
    public function index(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        $now = Carbon::now();
        $expiration = $now->subDays(10);
        $announcements = DB::table('announcement')->where('created_at', '>=', $expiration)->get();
        return view('prof.dashboard', compact('announcements', 'data'));
    }

    public function login(){
        return view('prof.login');
    }

    public function signup(){
        return view('prof.signup');
    }

    public function profile(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        return view('prof.profile', compact('data'));
    }

    public function class(){
        $data = DB::table('users')->where('student_number', session()->get('id'))->get()->first();
        $classes = DB::table('class')->where('faculty_id', session()->get('id'))->get();
        $students = DB::table('users')->where('type', 'Student')->get();
        return view('prof.class', compact('data', 'classes', 'students'));
    }

    public function student_class(){
        $id = session()->get('id');
        $data = DB::table('users')->where('student_number', $id)->get()->first();
        $classes = DB::table('class')->where('faculty_id', $id)->get();
        $class_ids = [];
        foreach($classes as $class){
            array_push($class_ids, $class -> id);
        }
        $students = DB::table('class_members')->whereIn('class_id', $class_ids)->get();
        $student_ids = [];
        foreach($students as $student){
            array_push($student_ids, $student -> student_number);
        }

        $student_list = DB::table('users')->whereIn('student_number', $student_ids)->get();

        $students_with_class = [];
        foreach($classes as $class){
            foreach($students as $student){
                foreach($student_list as $list){
                    if($list->student_number == $student->student_number && $class->id == $student->class_id)
                        array_push($students_with_class, ['class_id'=>$class->id, $list]);
                }
            }
        }
        return view('prof.students', compact('data', 'classes', 'students_with_class'));
    }

    public function send_message(Request $request){
            $faculty_id = $request -> post('faculty_id_modal');
            $class_id = $request ->post('class_list_modal');
            $subject = $request ->post('subject_modal');
            $message = $request -> post('message_modal');
            date_default_timezone_set('Asia/Singapore');
            $now = date('Y-m-d H:i:s');
            $data = DB::table('users')->where('student_number', $faculty_id)->get()->first();
            if(DB::table('announcement')->insert([
                'subject' => $subject,
                'content' => $message,
                'type' => 'Student',
                'class_id' => $class_id,
                'created_by' => $data -> lname . ' ' . $data -> fname . ' ' . substr($data -> mname, 0, 1) . '.',
                'created_at' => $now
            ])){
                return back()->with('send_message_success', 'Message sent!');
            }
            else {
                return back()->withErrors([
                    'send_message_err' => 'Message was not sent!'
                ]);
            }
    }

    public function view_history(Request $request){

        $id = $request -> input('student_number');
        $class_id = $request -> input('class_id');
        $class = DB::table('class')->where('id', $class_id)->get()->first();
        $student = DB::table('activity_logs')->where('identity_number', $id)->where('section', $class -> class_name)->get();
        $response = '<table class="table table-hover" id="hist_table">
                        <thead>
                            <tr>
                                <th><small>Student number</small></th>
                                <th><small>Fullname</small></th>
                                <th><small>Class</small></th>
                                <th><small>Time-in</small></th>
                                <th><small>Time-out</small></th>
                            </tr>
                        </thead>
                    <tbody>';

        foreach($student as $s){
            $response .= "<tr>";
            $response .= "<td>$s->identity_number</td>";
            $response .= "<td>$s->name</td>";
            $response .= "<td>$s->section</td>";
            $response .= "<td>$s->time_in</td>";
            $response .= "<td>$s->time_out</td>";
            $response .= "</tr>";
        }
        $response .= '</tbody></table>';
        return response()->json($response);
    }

    public function attendance(){
        $id = session()->get('id');
        $data = DB::table('users')->where('student_number', $id)->get()->first();

        $classes = DB::table('class')->where('faculty_id', $id)->get();
        $class_ids = [];
        foreach($classes as $class){
            array_push($class_ids, $class -> id);
        }
        $students = DB::table('class_members')->whereIn('class_id', $class_ids)->get();
        $student_ids = [];
        foreach($students as $student){
            array_push($student_ids, $student -> student_number);
        }

        $student_list = DB::table('activity_logs')->whereIn('identity_number', $student_ids)->get();
        $students_with_class = [];
        foreach($classes as $class){
            foreach($students as $student){
                foreach($student_list as $list){
                    if($list->identity_number == $student->student_number && $class->id == $student->class_id && $class->class_name == $list->section)
                        array_push($students_with_class, ['class_id'=>$class->id, $list]);
                }
            }
        }

        //  dd($students_with_class);
        return view('prof.attendance', compact('data', 'classes', 'students_with_class'));
    }

    public function view_absents(Request $request){
        
        $date = $request -> post('absent_date'); // the date you want to check for absents
        $class_id = $request -> post('absent_class'); // the name of the class you want to check for absents
    
        $students = DB::table('class_members')->where('class_id', $class_id)->get();

        $class_name = DB::table('class')->where('id', $class_id)->get()->first();
        $student_ids = [];
        foreach($students as $student){
            array_push($student_ids, $student -> student_number);
        }
        $master_student_list = DB::table('users')->whereIn('student_number', $student_ids)->get();
        $present_students = DB::table('activity_logs')->where('section', $class_name->class_name)->whereDate('time_out', $date)->whereIn('identity_number', $student_ids)->get();
        $absents = [];
        $isAbsent = false;
        foreach($master_student_list as $m){
            foreach($present_students as $p){
                if($m->student_number == $p->identity_number){
                    $isAbsent = false;
                }
                else {
                    $isAbsent = true;
                }
            }
            if($isAbsent){
                array_push($absents, $m);
            }
        }
        return response()->json($absents);
    }

    public function add_class(Request $reqeust){
        $class_name = $reqeust -> post('class_name');
        $faculty_id = $reqeust -> post('faculty_id');
        date_default_timezone_set('Asia/Singapore');
        $now = date('Y-m-d H:i:s');
        $single_space_class = preg_replace('/\s+/', ' ', $class_name);
        $new_class_name = strtoupper(str_replace(" ","-",$single_space_class));

        if(DB::table('class')->where('class_name', $new_class_name)->exists()){
            return back()->withErrors([
                'add_err' => "Class was already added",
            ]);
        }
        else {
            if(DB::table('class')->insert([
                'faculty_id' => $faculty_id,
                'class_name' => $new_class_name,
                'created_at' => $now ]
            )){
                return redirect('/faculty/class')->with('add_success', 'Class added!');
            }
            else {
                return back()->withErrors([
                    'add_err' => "Class was not added",
                ]);
            }
        }

    }

    public function add_students_to_class(Request $reqeust){
        $students = explode(',', $reqeust -> student_id);
        $class_id = $reqeust -> class_id;
        date_default_timezone_set('Asia/Singapore');
        $now = date('Y-m-d H:i:s');
        $data = [];
        foreach($students as $id){
            array_push($data,   ['class_id' => $class_id,'student_number' => $id, 'created_at' => $now]);
            if(DB::table('class_members')->where('class_id', $class_id)->where('student_number', $id)->exists()){
                $class_name = DB::table('class')->where('id', $class_id)->get()->first()->class_name;
                return back()->withErrors([
                    'add_err' => "Student $id is already in the class $class_name, the other selected student was not added to the class.",
                ]);
            }
        }

        if(DB::table('class_members')->insert($data)){
            return redirect('/faculty/class')->with('add_success', "Successfully added selected students!");
        }
        else {
            return back()->withErrors([
                'add_err' => "Students was not added",
            ]);
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/faculty/login');
    }

    public function submit_signup(Request $reqeust){
        $id = $reqeust -> post('identity_number');
        $lname = $reqeust -> post('lname');
        $fname = $reqeust -> post('fname');
        $mname = $reqeust -> post('mname');
        $sex = $reqeust -> post('sex');
        $birthdate = $reqeust -> post('birthdate');
        $email = $reqeust -> post('email');
        $contact = $reqeust -> post('contact');
        $password = $reqeust -> post('password');
        $confirm = $reqeust -> post('confirm');
        $dep = $reqeust -> post('dep');


        if($password != $confirm){
            return back()>withInput($reqeust -> input())->withErrors([
                'pass_err' => "Password doesn't match",
            ]);
        }

        $mimeType = $request->file('picture')->getMimeType();
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

        $data = DB::table('users')->where('student_number', $id)->where('rejected', '0')->exists();
        $email_exists = DB::table('users')->where('email', $email)->exists();

        if($data){
            return back()->withInput($reqeust -> input())->withErrors([
                'id_err' => "Employee Number already registered",
            ]);
        }
        else if($email_exists){
            return back()->withInput($reqeust -> input())->withErrors([
                'email_err' => "Email already registered",
            ]);
        }
        else {
            $picture = $reqeust->file('picture');
            $unique_id = uniqid();
            $picture_filename = $unique_id . '-' .$studentnumber . '-image' . '.' . $reqeust->file('picture')->extension();
            $filePath_picture = base_path("/public_html/uploaded/picture");
            $picture->move($filePath_picture, $picture_filename);
            $full_file_path_picture = "/uploaded/picture/$picture_filename";

            date_default_timezone_set('Asia/Singapore');
            $now = date('Y-m-d H:i:s');
            DB::table('users')->insert([
                'student_number' => $id,
                'lname' => $lname,
                'fname' => $fname,
                'mname' => $mname,
                'sex' => $sex,
                'birthdate' => $birthdate,
                'email' => $email,
                'contact' => $contact,
                'dep' => $dep,
                'type' => 'Faculty',
                'picture' => $full_file_path_picture,
                'created_at' => $now
            ]);

            DB::table('accounts')->insert([
                'identity_number' => $id,
                'type' => 'Faculty',
                'email' => $email,
                'password' => $password,
                'created_at' => $now
            ]);

            return redirect()->route('login')->with('success', 'Success!');
        } 
    }

    public function submit_login(Request $reqeust){
        $email = $reqeust -> post('email');
        $password = $reqeust -> post('password');
        $account = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Faculty')->get();
        if(count($account) >= 1){
             if($account[0] -> status == '0'){
                 return back()->withErrors([
                     'login_err' => "Account hasn't been activated yet",
                 ]);
             }
             else if($account[0] -> status == '1'){
                 session()->put('id', $account[0] -> identity_number);
                 return redirect()->route('professor-home');
             }
             else if($account[0] -> status == '3'){
                 return back()->withErrors([
                     'login_err' => "Account rejected by admin.",
                 ]);
             }

             else {
                return back()->withErrors([
                    'login_err' => "Unknown error occured, please try again later.",
                ]);
             }
        }
        else {
             return back()->withErrors([
                 'login_err' => "Wrong email or password",
             ]);
        }
    }

    public function request(Request $request){
        $requests = DB::table('users')->where('type', 'Student')->get();
        return view('prof.requests', compact('requests'));
    }

    public function acceptRequest(Request $request){

        DB::table('users')
        ->where('student_number', $request->id)
        ->update(['status' => 1]);

        DB::table('accounts')
        ->where('identity_number', $request->id)
        ->update(['status' => 1]);

        return redirect('/faculty/requests')->with('add_success', $request -> id . '');
    }

    public function rejectRequest(Request $request){
        DB::table('users')
        ->where('student_number', $request->id)
        ->update(['status' => 3, 'rejected' => 1]);

        DB::table('accounts')
        ->where('identity_number', $request->id)
        ->update(['status' => 3]);
        
        return redirect('/faculty/requests')->with('reject_success',  $request -> id . '');
    }
}
