<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Event;
use Session;
class ServiceController extends Controller
{
    public function services(){
    	Session::put('page','services');
    	$services=Service::with('event')->get();
    	//$services=json_decode(json_encode($services));
    	//echo "<pre>";print_r($services);die;
    	return view('admin.services.services')->with(compact('services'));
    }

    public function updateServiceStatus(Request $request){
    	if($request->ajax()){
    		$data=$request->all();
    		//echo "<pre>";print_r($data); die;
    		if($data['status']=="Active"){
    			$status=0;
    		}else{
    			$status=1;
    		}
    		Service::where('id',$data['service_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'service_id'=>$data['service_id']]);
    	}
    }

     public function deleteService($id){
        //delete Service
        Service::where('id',$id)->delete();
        Session::flash('success_message','Service has been deleted Successfully');
            return redirect()->back();
    }

    public function addEditService(Request $request ,$id=null){
    	if($id==""){
    		$title="Add Service";
            $service= new Service;
            $serviceData=array();
            $message="Service added Successfully!";
    	}else{
    		$title="Edit Service";
            $serviceData=Service::find($id);
            $serviceData=json_decode(json_encode($serviceData),true);
            //echo "<pre>";print_r($serviceData);die;
            $service=Service::find($id);
            $message="Service updated Successfully!";
    	}

    	if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>";print_r($data); die;

            //service validations
            $rules=[
                'event_id'=>'required',
                'type'=>'required',
                'no_of_photos'=>'required',  
                'price'=>'required',                             
            ];
            $customMessages=[
                'event_id.required'=>'Event is required',
                'type.required'=>'Plan is required',
                'no_of_photos.required'=>'No of Photos is required', 
                'price.required'=>'price is required',                
            ];
            $this->validate($request,$rules,$customMessages);
     
            //save album details in products table            
            $service->event_id=$data['event_id'];
            $service->type=$data['type'];
            $service->no_of_photos=$data['no_of_photos'];
            $service->price=$data['price'];  
            $service->status=1;
            $service->save();
            Session::flash('success_message',$message);
            return redirect('admin/services');
        }
    
    	//get all events
        $events=Event::where('status',1)->get();
        $events=json_decode(json_encode($events),true);
        //echo "<pre>";print_r($events); die;


        return view('admin.services.add_edit_service')->with(compact('title','events','serviceData'));
    }
}

