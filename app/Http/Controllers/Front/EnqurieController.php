<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Enquiry;
use App\Admin;
class EnqurieController extends Controller
{
    public function contact(Request $request){
    if($request->isMethod('post')){
             $data= $request->all();
             //echo "<pre>";print_r($data);die;

             
            $validator = Validator::make($request->all(),[
                'fname'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'lname'=>'required|regex:/^[\pL\s\-]+$/u|max:255',
                'email'=>'required|email',
                'subject'=>'required'

            ]);

            $enquiry=new Enquiry;
            $enquiry->fname=$data['fname'];
            $enquiry->lname=$data['lname'];
            $enquiry->email=$data['email'];
            $enquiry->subject=$data['subject'];
            $enquiry->message=$data['message'];           
            $enquiry->save();

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput(); 
            }

            //send contact email
            $email="reshmsaw@gmail.com";
            $messageData=[  
                'fname'=>$data['fname'],             
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'comment'=>$data['message']
            ];
            Mail::send('emails.enquiry',$messageData,function($message)use($email){
                $message->to($email)->subject('Enquiry from Photogallery Website');
            });
            
            
            return redirect()->back()->with('flash_message_success','Thanks for your enquiry. We will get back to you soon.');
        }

        $adminDetails=Admin::where('status',1)->get()->toArray();
        //dd($adminDetails);die;
        return view('front.contact')->with(compact('adminDetails'));

    }
}
