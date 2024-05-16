<?php

namespace App\Http\Controllers;

use App\Mail\emailMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email(){
        Mail::to('pfecms7@gmail.com')->send(new emailMessage());
        return back()->with('success','Email sent!');

        
    }
    public function sendemail(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        // if($this->isonline()){
        //     return 'connected';
        // }else{
        //     return 'ur not connected';
        // }


        if($this->isonline()){
            $mail_data=[
                'recipient'=>'pfecms7@gmail.com',
                'fromEmail' =>$req->email,
                'fromName'=> $req->name,
                'subject'=>$req->subject,
                'body'=>$req->message

            ];
            Mail::send('email',$mail_data,function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'],$mail_data['fromName'])
                        ->subject($mail_data['subject']);
                        });
                return back()->with('success','Email sent!');
        }else{
            return redirect()->back()->withInput()->with('error','check ur internet connection');
        }

    }

    public function emailcontact(){
        return view('contactUsPage');
    }

    public function isonline($site='https://google.com/'){
        if(@fopen($site,'r')){
            // 'r' specifies that the file should be opened in read mode.
            return true;
        }
        else{
            return false;
        }
    }
}
