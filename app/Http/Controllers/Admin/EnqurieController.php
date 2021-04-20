<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enquiry;
use Session;
class EnqurieController extends Controller
{
    public function enqurie(){
    	Session::put('page','enqurie');
    	$enquries=Enquiry::all()->where('status',0);
    	//$enquries=json_decode(json_encode($enquries),true);
    	//echo "<pre>";print_r($enquries);die;
    	return view('admin.enquiry.enquiry')->with(compact('enquries'));
    }

    public function updateEnquiryStatus(Request $request){
    	if($request->ajax()){
    		$data=$request->all();
    		//echo "<pre>";print_r($data); die;
    		if($data['status']=="Active"){
    			$status=0;
    		}else{
    			$status=1;
    		}
    		Enquiry::where('id',$data['enquiry_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'enquiry_id'=>$data['enquiry_id']]);
    	}
    }
   
    public function oldEnquirydata(){
        $enquries_old=Enquiry::all()->where('status',1);
        //$enquries_old=json_decode(json_encode($enquries_old),true);
        //echo "<pre>";print_r($enquries_old);die;
        return view('admin.enquiry.old_enquiry_data')->with(compact('enquries_old'));
    }
}
