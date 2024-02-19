<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $data = DB::table('accounts')->where('identity_number', session()->get('id'))->get()->first();
        return view('staff.dashboard', compact('data'));
    }

    public function login(){
        return view('staff.login');
    }

    public function logout(){
        session()->flush();
        return redirect('/staff/login');
    }

    public function submit_login(Request $request){
        $email = $request -> post('email');
        $password = $request -> post('password');
        $account = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Staff')->get();
        if(count($account) >= 1){
            session()->put('id', $account[0] -> identity_number);
            return redirect()->route('staff-home');      
        }
        else {
             return back()->withErrors([
                 'login_err' => "Wrong email or password",
             ]);
        }
    }

    public function logs(){
        $logs = DB::table('activity_logs')->orderBy('updated_at', 'desc')->get();
        $data = DB::table('accounts')->where('identity_number', session()->get('id'))->get()->first();
        return view('staff.logs', compact('logs', 'data'));
    }

    public function add_announcemnet(Request $request){
        $subject = $request -> post('subject');
        $content = $request -> post('content');
        $type = $request -> post('type');
        date_default_timezone_set('Asia/Singapore');
        $now = date('Y-m-d H:i:s');

        $data = DB::table('accounts')->where('identity_number', session()->get('id'))->get()->first();

        if(DB::table('announcement')->insert([
            'subject' => $subject,
            'content' => $content,
            'type' => $type,
            'created_by' => $data -> staff_for . ' Staff',
            'created_at' => $now,

        ])){
            return redirect()->route('staff-home')->with('success', 'Successfully add announcement');

        }
        else {
            return back()->withErrors('add_err', "Announcement failed to submit");
        }
      
    }
}
