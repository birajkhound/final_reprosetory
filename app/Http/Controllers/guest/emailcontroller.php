<?php

namespace App\Http\Controllers\guest;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\PayUService\Exception;
class emailcontroller extends Controller
{
    //

    public function usersMail(Request $r){
        $validator = Validator::make($r->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'subject' => 'required|string',
            'message' => 'required|string|max:200',
        ]);       
        if($validator->fails()){
            return response()->json(['validation_fail' => $validator->errors()], 400);
        }
        else{
            try {
                $details =[
                    'name' => $r->name,
                    'email' => $r->email,
                    'subject' => $r->subject,
                    'message' => $r->message,
                ];
                Mail::to('assamesedictionarytest@gmail.com')->send(new ContactMail($details));
                return response()->json(['email_send' =>"Email has been send successfully"], 200);
            }
                catch (\Exception $e) {
                    return response()->json(['email_send' => $e->getMessage()],400);
                }
            }
        }

    }
