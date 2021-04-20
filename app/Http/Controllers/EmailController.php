<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(){
    	return view('email');
    }
    public function send(Request $request){

    	$people = User::get();
        foreach($people as $p){
            Mail::to($p->email)
                ->send(new TestMail($request));
            
            }
        }
        return redirect()->back();
    }
}
