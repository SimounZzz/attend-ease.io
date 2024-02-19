<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class RFIDController extends Controller
{
    public function getData(Request $request){
        date_default_timezone_set('Asia/Singapore');
        $card_id =  $request -> card_id;
        $api_token = 'token_ni_garlan';
        $api_token_in = $request -> api_token;

        if($api_token == $api_token_in){
            if (DB::table('users')->where('rfid', $card_id)->exists()) {
                $data = DB::table('users')->where('rfid', $request->card_id)->get()->first();
                $type = $data -> type;
                $cardid = $data -> rfid;
                $id = $data -> student_number;
                $fullname = $data -> lname . ' ' . $data -> fname . ' ' . $data -> mname;
                $location =  $request -> location;
                
                $section =  $request -> section;
                if($section == null)
                    $section = '';

                $today = Carbon::now();
                $now = $today -> toDateTimeString();

                $time_out_empty = DB::table('activity_logs')->where('card_id', $card_id)->where('time_out', '=', "")->where('location', '!=', 'Entrance')->orderBy('updated_at', 'desc')->exists();

                $time_out_empty_entrance = DB::table('activity_logs')->where('card_id', $card_id)->where('time_out', '=', "")->where('location', 'Entrance')->orderBy('updated_at', 'desc')->exists();
                
                if($data->card_status == '0'){
                    echo "card_disabled,$data->fname";
                }

                else if($type == 'Student' && !$time_out_empty_entrance && $location == 'Entrance'){
                    if(DB::table('activity_logs')->insert([
                        'type' => $type,
                        'card_id' => $card_id,
                        'identity_number' => $id,
                        'name' => $fullname,
                        'location' => $location,
                        'section' => $section,
                        'time_in' => $now,
                        'time_out' => "",
                        'updated_at' => $now,
                    ])){
                        echo "time_in_success,$data->fname";
                    }

                    else {
                        echo "time_in_failed,$data->fname";
                    }    
                }

                else if($type == 'Student' && $time_out_empty_entrance && $location == 'Entrance'){
                    $time_in = DB::table('activity_logs')->where('card_id', $card_id)->where('location', 'Entrance')->orderBy('updated_at', 'desc')->get()->first();
                    $check_time_in = Carbon::now()->subSeconds(30)->toDateTimeString();

                    if($check_time_in >= $time_in -> time_in){
                        if(DB::table('activity_logs')->where('card_id', $card_id)->where('location', 'Entrance')->orderBy('updated_at','desc')->take(1)->update([
                            'time_out' => $now,
                            'updated_at' => $now,
                        ])){
                            echo "time_out_success,$data->fname";
                        }
                        else {
                            echo "time_out_failed,$data->fname";
                        }
                    }
                    else {
                        echo "time_out_failed,$data->fname";
                    }
                }
                
                else if($type == 'Faculty' && !$time_out_empty_entrance && $location == 'Entrance'){
                    if(DB::table('activity_logs')->insert([
                        'type' => $type,
                        'card_id' => $card_id,
                        'identity_number' => $id,
                        'name' => $fullname,
                        'location' => $location,
                        'time_in' => $now,
                        'time_out' => '',
                        'updated_at' => $now,
                    ])){
                        echo "time_in_success,$data->fname";
                    }
                    else {
                        echo "time_in_failed,$data->fname";
                    }      
                }

                else if($type == 'Faculty' && $time_out_empty_entrance && $location == 'Entrance'){
                    $time_in = DB::table('activity_logs')->where('card_id', $card_id)->where('location', 'Entrance')->orderBy('updated_at', 'desc')->get()->first();
                    $check_time_in = Carbon::now()->subSeconds(30)->toDateTimeString();

                    if($check_time_in >= $time_in -> time_in){
                        if(DB::table('activity_logs')->where('card_id', $card_id)->orderBy('updated_at','desc')->take(1)->update([
                            'time_out' => $now,
                            'updated_at' => $now,
                        ])){
                            echo "time_out_success,$data->fname";
                        }
                        else {
                            echo "time_out_failed,$data->fname";
                        }
                    }
                    else {
                        echo "time_out_failed,$data->fname";
                    }
                }

                else if($type == 'Student' && !$time_out_empty){
                    if(DB::table('activity_logs')->insert([
                        'type' => $type,
                        'card_id' => $card_id,
                        'identity_number' => $id,
                        'name' => $fullname,
                        'location' => $location,
                        'section' => $section,
                        'time_in' => $now,
                        'time_out' => "",
                        'updated_at' => $now,
                    ])){
                        echo "time_in_success,$data->fname";
                    }
                    else {
                        echo "time_in_failed,$data->fname";
                    }     
                }
                else if($type == 'Student' && $time_out_empty){
                    $time_in = DB::table('activity_logs')->where('card_id', $card_id)->orderBy('updated_at', 'desc')->get()->first();
                    $check_time_in = Carbon::now()->subSeconds(30)->toDateTimeString();

                    if($check_time_in >= $time_in -> time_in){
                        if(DB::table('activity_logs')->where('card_id', $card_id)->orderBy('updated_at','desc')->take(1)->update([
                            'time_out' => $now,
                            'updated_at' => $now,
                        ])){
                            echo "time_out_success,$data->fname";
                        }
                        else {
                            echo "time_out_failed,$data->fname";
                        }
                    }
                    else {
                        echo "time_out_failed,$data->fname";
                    }
                }

                else if($type == 'Faculty' && !$time_out_empty){
                    if(DB::table('activity_logs')->insert([
                        'type' => $type,
                        'card_id' => $card_id,
                        'identity_number' => $id,
                        'name' => $fullname,
                        'location' => $location,
                        'time_in' => $now,
                        'time_out' => '',
                        'updated_at' => $now,
                    ])){
                        echo "time_in_success,$data->fname";
                    }
                    else {
                        echo "time_in_failed,$data->fname";
                    }    
                }

                else if($type == 'Faculty' && $time_out_empty){
                    $time_in = DB::table('activity_logs')->where('card_id', $card_id)->orderBy('updated_at', 'desc')->get()->first();
                    $check_time_in = Carbon::now()->subSeconds(30)->toDateTimeString();

                    if($check_time_in >= $time_in -> time_in){
                        if(DB::table('activity_logs')->where('card_id', $card_id)->orderBy('updated_at','desc')->take(1)->update([
                            'time_out' => $now,
                            'updated_at' => $now,
                        ])){
                            echo "time_out_success,$data->fname";
                        }
                        else {
                            echo "time_out_failed,$data->fname";
                        }
                    }
                    else {
                        echo "time_out_failed,$data->fname";
                    }
                }
            }
            else {
                echo 'id_not_registered';
            }     
        }
        else {
            echo 'wrong_token';
        }
    }
    
    public function setCardID(Request $request){
        date_default_timezone_set('Asia/Singapore');
        $card_id = $request -> input('card_id');
        $api_token = 'token_ni_garlan';
        $api_token_in = $request -> api_token;

        if($api_token == $api_token_in){
            if($card_id){
                if (DB::table('users')->where('rfid', $card_id)->exists()) {
                    $now = date('Y-m-d H:i:s');
                    DB::table('scanned_rfid')->where('id', '1')->update(['scanned_id' => 'Card id already registered', 'updated_at' => $now]);
                    echo 'cardid_exists';
                }
                else {
                    $now = date('Y-m-d H:i:s');
                    DB::table('scanned_rfid')->where('id', 1)->update(['scanned_id' => $card_id, 'updated_at' => $now]);
                    echo 'set_success';
                }
            }
            else {
                echo 'empty_card';
            }
        }
        else {
            echo 'wrong_token';
        }
    }

    public function latestLog(){
        $role = session()->get('role');
        $id = session()->get('id');

        if($role == 'Admin'){
            $locations = DB::table('location')->get();
            return view('latest-log', compact('locations'));
        }
        else if($role == 'Staff'){
            $staff_for = DB::table('accounts')->where('identity_number', $id)->get()->first()->staff_for;
            $locations = DB::table('location')->where('loc', $staff_for)->get();
            return view('latest-log', compact('locations'));
        }

        else if($role == 'Faculty'){
            $classes = DB::table('class')->where('faculty_id', $id)->get();
            return view('latest-log', compact('classes'));
        }
        else {
            return back();
        }
       
       
    }

    public function getLatestLog(Request $request){
        $latestScan = '';
        if(session()->get('role') == 'Faculty'){
            $latestScan = DB::table('activity_logs')->where('section', $request -> post('location'))->latest('updated_at')->first();
        }
        else {
            $latestScan = DB::table('activity_logs')->where('location', $request -> post('location'))->latest('updated_at')->first();
        }
      
        if ($latestScan) {
            $user = DB::table('users')->where('student_number', $latestScan -> identity_number)->get()->first();
            $latestScan->picture = $user->picture;
            return response()->json($latestScan);
        }
        else {
            return response()->json(array());
        }
    }
}
