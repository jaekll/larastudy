<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('blog.contact');
   }

    public function sendInfo(ContactRequest $request){
        $data = $request->only('name','email','phone');
        $data['messageLines'] = explode("\n",$request->get('message'));

        Mail::queue('emails.contact',$data,function($message) use ($data){
            $message->subject('Blog contact form:'.$data['name'])
                ->to(config('blog.contact_email'))
                ->replyTo($data['email']);
        });
        return back()->withSuccess("thank u from message");
    }
}
