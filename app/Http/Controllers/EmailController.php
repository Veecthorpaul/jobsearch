<?php

namespace App\Http\Controllers;

use App\Mail\SendJob;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
   
    
public function send(Request $get) {

    $this->validate($get, [
        "email" => "required",
        "sender" => "required",
        "recipient" => "required",
        "message" => "required",
    ]);
        $homeUrl = url('/');
        $jobId = $get['job_id'];
        $jobSlug = $get['job_slug'];
        $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;
        $email = $get->email;
        $sender= $get->sender;
        $recipient= $get->recipient;
        $message= $get->message;
        $url =  $jobUrl;
      
       Mail::to($email)->send( new SendJob($sender, $recipient, $message, $url) );

        return redirect()->back()->with('message','Job Sent Successfully');
    } 

    public function contact(Request $get) {

        $this->validate($get, [
            "name" => "required",
            "message" => "required",
            "email" => "required",
        ]);

            $reciever = $get->reciever;
            $name= $get->name;
            $email= $get->email;
            $message= $get->message;
          
           Mail::to($reciever)->send( new SendJob($name, $email, $message) );
    
            return redirect()->back()->with('message','Mail Sent Successfully');

            
        } 

        public function emailus(Request $request)
{
    $name = $request->get('name');
    $email = $request->get('email');
    $message = $request->get('message');
    $reciever =  $request->get('reciever');
    $recipient =  $request->get('recipient');
     Mail::to($reciever)->send( new SendMail($recipient, $name, $email, $message) );

return response()->json(['msg' => 'Your E-mail was sent! Allegedly.'], 200);

}
public function contactus(Request $get) {

    $this->validate($get, [
        "name" => "required",
        "message" => "required",
        "email" => "required",
    ]);

        $reciever = $get->reciever;
        $recipient = $get->recipient;
        $name= $get->name;
        $email= $get->email;
        $message= $get->message;
      
       Mail::to($reciever)->send( new SendMail($name, $email, $message, $recipient) );
        return response()->json(['msg' => 'Your mail was successfully sent.'], 200);
    } 

}
