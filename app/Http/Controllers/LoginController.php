<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function submit_login(Request $request){
        // dd($request -> all());

        $type = $request -> post('type');
        $email = $request -> post('email');
        $password = $request -> post('password');

        if($type == 'Staff'){
            $staff_exists = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Staff')->exists();

            if($staff_exists){
                $acc = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Staff')->get()->first();
                session()->put('id', $acc -> identity_number);
                session()->put('role', 'Staff');
                return redirect()->route('staff-home');
            }
            else {
                return back()->withInput($request -> input())->withErrors([
                    'login_err' => "Invalid email or password.",
                ]);
            }
        }
        else if($type == 'Admin'){
            $admin_exists = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Admin')->exists();

            if($admin_exists){
                $acc = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Admin')->get()->first();
                session()->put('id', $acc -> identity_number);
                session()->put('role', 'Admin');
                return redirect()->route('admin-home');
            }
            else {
                return back()->withInput($request -> input())->withErrors([
                    'login_err' => "Invalid email or password.",
                ]);
            }
        }

        else if($type == 'Student'){

            $acc_exists = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Student')->exists();

            if($acc_exists){
                $acc = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Student')->get()->first();

                if($acc -> status == '0'){
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Account hasn't been activated yet",
                    ]);
                }
                else if($acc -> status == '1'){
                    session()->put('id', $acc -> identity_number);
                    session()->put('role', 'Student');
                    return redirect()->route('student-home');
                }
                else if($acc -> status == '3'){
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Account rejected by admin.",
                    ]);
                }
                else {
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Unknown error occured, please contact the admin.",
                    ]);
                }
            }
            else {
                return back()->withInput($request -> input())->withErrors([
                    'login_err' => "Invalid email or password.",
                ]);
            }
        }
        else if($type == 'Faculty'){
            $acc_exists = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Faculty')->exists();

            if($acc_exists){
                $acc = DB::table('accounts')->where('email', $email)->where('password', $password)->where('type', 'Faculty')->get()->first();

                if($acc -> status == '0'){
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Account hasn't been activated yet",
                    ]);
                }
                else if($acc -> status == '1'){
                    session()->put('id', $acc -> identity_number);
                    session()->put('role', 'Faculty');
                    return redirect()->route('professor-home');
                }
                else if($acc -> status == '3'){
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Account rejected by admin.",
                    ]);
                }
                else {
                    return back()->withInput($request -> input())->withErrors([
                        'login_err' => "Unknown error occured, please contact the admin.",
                    ]);
                }
            }
            else {
                return back()->withInput($request -> input())->withErrors([
                    'login_err' => "Invalid email or password.",
                ]);
            }
        }
        else {
            return back()->withInput($request -> input())->withErrors([
                'login_err' => "Please select a login type.",
            ]);
        }
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }
}
