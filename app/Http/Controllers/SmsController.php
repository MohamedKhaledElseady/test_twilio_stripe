<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client ;
class SmsController extends Controller
{
    public function __construct() 
    {
    }

    public function sendSMs() 
    {
        $sid = env("TWILIO_SID");
        $token= env("TWILIO_TOKEN");
        $senderNumber = \env("TWILIO_PHONE");
        $client = new Client($sid, $token);
        $message = $client->messages->create(\request()->to, [
            "body"=>request()->message ,
            "from"=> $senderNumber,
        ]);

        dd($message);
    }
    public function showForm() {
        return view("smsFrom");
    }
}
