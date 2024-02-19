<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;

class AdminController extends Controller
{
    
    public function index(Request $request){
        
        return view('admin.dashboard');
    }

    public function add_announcemnet(Request $request){
        $subject = $request -> post('subject');
        $content = $request -> post('content');
        $type = $request -> post('type');
        date_default_timezone_set('Asia/Singapore');
        $now = date('Y-m-d H:i:s');

        if(DB::table('announcement')->insert([
            'subject' => $subject,
            'content' => $content,
            'type' => $type,
            'created_by' => 'Admin',
            'created_at' => $now,

        ])){
            return redirect()->route('admin-home')->with('add_success', 'Successfully added announcement');

        }
        else {
            return back()->withErrors('add_err', "Announcement failed to submit");
        }
      
    }

    public function login(){
        return view('admin.login');
    }

    public function submit_login(Request $request){
        $email = $request -> post('email');
        $password = $request -> post('password');
        $account = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Admin')->get();
        if(count($account) >= 1){
            session()->put('id', $account[0] -> identity_number);
            return redirect()->route('admin-home');      
        }
        else {
             return back()->withErrors([
                 'login_err' => "Wrong email or password",
             ]);
        }
    }

    public function requests(){
        $requests = DB::table('users')->get();
        return view('admin.requests', compact('requests'));
    }

    public function manageRequests(){
        $scanned_id = DB::table('scanned_rfid')->get();
        $requests = DB::table('users')->get();
        return view('admin.manage-requests', compact('scanned_id', 'requests'));
    }

    public function acceptRequest(Request $request){

        DB::table('users')
        ->where('student_number', $request->id)
        ->update(['status' => 1]);

        DB::table('accounts')
        ->where('identity_number', $request->id)
        ->update(['status' => 1]);

        return redirect('/admin/requests')->with('add_success', $request -> id . '');
    }

    public function rejectRequest(Request $request){
        DB::table('users')
        ->where('student_number', $request->id)
        ->update(['status' => 3, 'rejected' => 1]);

        DB::table('accounts')
        ->where('identity_number', $request->id)
        ->update(['status' => 3]);
        
        return redirect('/admin/requests')->with('reject_success',  $request -> id . '');
    }

    public function addIDtoStudent(Request $request){
        // dd($request -> post('card_id'));

        date_default_timezone_set('Asia/Singapore');
        $now = date('Y-m-d H:i:s');

        $card_id = $request -> post('card_id');
        $student_number = $request -> post('student_number');

        $validator = Validator::make($request->all(), [
            'student_number' => 'required',
        ]);

        if ($card_id == 'No card id found' || $card_id == 'Card id already registered') {
            return back()->withErrors([
                'no_card_id_found' => 'Card ID not found',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors([
                'studentid_err' => 'Student ID must not be empty.',
            ]);
        }

        
        if( DB::table('users')->where('student_number', $student_number)->where('status', 1)->exists()){

             DB::table('users')
            ->where('student_number', $student_number)
            ->update(['rfid' => $card_id, 'status' => 2, 'card_status' => 1]);
    
            DB::table('scanned_rfid')
            ->where('id', 1)
            ->update(['scanned_id' => "No card id found", 'updated_at' => $now]);

        }
        else {
            return back()->withErrors([
                'student_number_not_found' => 'Student number not found on requests.',
            ]);
        }

        return redirect('/admin/manage-requests')->with('add_success', "Card: $card_id has been added to Student: $student_number");
    }

    public function users_faculty(){
        $users = DB::table('users')->where('type', 'Faculty')->orderBy('created_at', 'desc')->get();
        return view('admin.users-faculty', compact('users'));
    }

    public function users_student(){
        $users = DB::table('users')->where('type', 'Student')->orderBy('created_at', 'desc')->get();
        return view('admin.users-student', compact('users'));
    }
    
        public function disable_card(Request $request){
        $id = $request -> input('id');

        DB::table('users')
        ->where('student_number', $id)
        ->update(['card_status' => 0]);

        return back();
    }

    public function enable_card(Request $request){
        $id = $request -> input('id');

        DB::table('users')
        ->where('student_number', $id)
        ->update(['card_status' => 1]);

        return back();
    }

    public function logs_room(){
        $logs = DB::table('activity_logs')->where('location', 'Room')->orderBy('updated_at', 'desc')->get();
        return view('admin.logs-room', compact('logs'));
    }

    public function logs_location(){
        $logs = DB::table('activity_logs')->where('location', '!=', 'Room')->orderBy('updated_at', 'desc')->get();
        $locations = DB::table('location')->where('loc', '!=', 'Room')->get();
        return view('admin.logs-location', compact('logs', 'locations'));
    }


    public function blocks(){
        $blocks = DB::table('blocks')->orderBy('id', 'desc')->get();
        $locations = DB::table('location')->get();
        return view('admin.blocks', compact('blocks', 'locations'));
    }

    public function uploadBlock(Request $request){
        $sid = $request -> input('sid');
        $location = $request ->input('location');
        $filename = $request -> input('filename');
        $hash = $request ->input('hash');
        if(DB::table('blocks')->insert([
            'sid' => $sid,
            'location' => $location,
            'filename' => $filename,
            'hash' => $hash
        ])){
            return response()->json(['filename'=>$filename]);
        }
        else {
            return response()->json(['upload_err'=> true, 'filename'=>$filename]);
        }
        
    } 

    public function logout(){
        session()->flush();
        return redirect('/admin/login');
    }
}
