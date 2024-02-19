<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;
use DB;

class FirebaseController extends Controller
{
    protected $database;

    public function __construct() {
        $this->database = app('firebase.database');
    }

    public function setMCUs(){
        $database = app('firebase.database');
        $classes = DB::table('class')->get();
        $loc_1 = $database->getReference('1/loc_1')->getValue();
        $loc_2 = $database->getReference('2/loc_2')->getValue();

        $sec_1 = $database->getReference('1/sec_1')->getValue();
        $sec_2 = $database->getReference('2/sec_2')->getValue();

        $selected = ['loc_1' => $loc_1, 'loc_2' => $loc_2, 'sec_1' => $sec_1, 'sec_2' => $sec_2];
        $locations = DB::table('location')->get();
        return view('admin.set-mcu', compact('classes', 'selected', 'locations'));
    }

    public function change(Request $request){
        $database = app('firebase.database');
        $type = $request -> post('type');
        if($type == '1'){
            $loc_1 = $request -> post('loc_1');
            $sec_1 = "";
            if($loc_1 == "Room"){
                $sec_1 = $request -> post('sec_1');
                if($sec_1 == ''){
                    return back()->withErrors([
                        'sec_1_err'=> "Section must not be empty."
                    ]);
                }
            }
            $database->getReference('1')->set([
                'loc_1' => $loc_1,
                'sec_1' => $sec_1
                ]);
            
            return redirect()->route('admin-set-mcu')->with([
                "set_1_success" => "Data successfully changed!"
            ]);
        }
        else if($type == '2'){
            $loc_2 = $request -> post('loc_2');
            $sec_2 = "";
            if($loc_2 == "Room"){
                $sec_2 = $request -> post('sec_2');
                if($sec_2 == ''){
                    return back()->withErrors([
                        'add_err'=> "Section must not be empty."
                    ]);
                }
                    
            }
            $database->getReference('2')->set([
                'loc_2' => $loc_2,
                'sec_2' => $sec_2,
                ]);
            
            return redirect()->route('admin-set-mcu')->with([
                "set_2_success" => "Data successfully changed!"
            ]);
        }
        else if($type == '3'){
            date_default_timezone_set('Asia/Singapore');
            $now = date('Y-m-d H:i:s');
            if(DB::table('location')->insert([
                'loc'=> $request -> location,
                'created_at' => $now
            ])){
                return redirect()->route('admin-set-mcu')->with([
                    'loc_success'=> "Location has been added!"
                ]);
            }
            else {
                return redirect()->route('admin-set-mcu')->withErrors([
                    'loc_err'=> "Location was not added, please try again later."
                ]);
            }
        }
        else {
            return redirect()->route('admin-set-mcu')->withErrors([
                'set_err'=> "Settings didn't change, please try again later"
            ]);
        }
    }
}
