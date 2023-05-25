<?php

namespace App\Http\Controllers\Admin_Functionality;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class profile_control extends Controller
{  
    public function findUser(){
        if(Auth::check()){
            $user = Auth::user();
            $user_details = array("id" => $user->id, "email" => $user->email , "name" => $user->name);
            return response()->json(['userdetails'=>$user_details],200);
        }else{
            return response()->json(['userdetails'=>'you are unauthorised'],400);
        }
       
    }
    public function userDetails(){
        return view('admin_functionality.profile');
        }

    public function ChangeEmail(Request $r){
        $validator = Validator::make($r->all(), [
            'auth_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:50',
        ]);
        if ($validator->fails()) {
            return response()->json(['email_error' => $validator->errors()],400);
        }
        else{
            try{
                $id = $r->auth_id;
                $email = $r->email;
                $password = $r->password;
                $user = DB::table('users')->where('id', $id)->first();
                if(Hash::check($password, $user->password)){
                $emailUpdate = DB::update("UPDATE `users` SET `email`='$email' WHERE `id`='$id'");
                return response()->json(['email_change' => 'ইমেইল সফলতাৰে সলনি কৰা হৈছে |'],200);
                }
                else{
                    $password_error = array("password" => array('Incorrect Password'));
                    return response()->json(['email_error' =>$password_error],400);
                }
            }
            catch (\Exception $e) {
                return response()->json(['email_error' => $e->getMessage()],400);
            }
        }

    }   
    public function changePassword(Request $r){
        $validator = Validator::make($r->all(), [
            'id' => 'required',
            'old_password' => 'required|min:8|max:50',
            'new_password' => 'required|min:8|max:50|confirmed',
            'new_password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['password_change' => $validator->errors()],400);
        }
        else{
            try{
                $id = $r->id;
                $o_pass = $r->old_password;
                $n_pass = Hash::make($r->new_password);
               // $c_pass = $r->new_password_confirmation;
                $user = DB::table('users')->where('id', $id)->first();
                if(Hash::check($o_pass, $user->password)){
                    $passUpdate = DB::update("UPDATE `users` SET `password`='$n_pass' WHERE `id`='$id'");
                return response()->json(['pass_change' =>"পাছৱৰ্ড সফলতাৰে সলনি কৰা হৈছে|"],200);}
                else{
                    $password_error = array("password" => array('Incorrect Password'));
                    return response()->json(['password_change' =>$password_error],400);
                }

            }
            catch (\Exception $e) {
                return response()->json(['password_change' => $e->getMessage()],400);
            }
        }
        
    } 
}
