<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Session;

class EventController extends Controller
{
    public function event(){
    	Session::put('page','event');
    	$events=Event::get();
    	//echo "<pre>";print_r($events);die;
    	return view('admin.event.events')->with(compact('events'));
    }

    public function updateEventStatus(Request $request){
    	if($request->ajax()){
    		$data=$request->all();
    		//echo "<pre>";print_r($data); die;
    		if($data['status']=="Active"){
    			$status=0;
    		}else{
    			$status=1;
    		}
    		Event::where('id',$data['event_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'event_id'=>$data['event_id']]);
    	}
    }

    public function addEditEvent(Request $request ,$id=null){
    	Session::put('page','events');
    	if($id==""){
    		$title="Add Event";
    		$event=new Event;
    		$message="Event added Successfully!";
    	}else{
    		$title="Edit Event";
    		$event=Event::find($id);
    		$message="Event updated Successfully!";
    	}

    	if($request->isMethod('post')){
    		$data=$request->all();
    		//echo "<pre>";print_r($data);die;
    		//brand validations
            $rules=[
                'event_name'=>'required|regex:/^[\pL\s\-]+$/u',                
            ];
            $customMessages=[
                'event_name.required'=>'Event Name is required',
                'event_name.regex'=>'Valid Event Name is required',               
            ];
            $this->validate($request,$rules,$customMessages);

            $event->name=$data['event_name'];
            $event->status=1;
            $event->save();

            Session::flash('success_message',$message);
            return redirect('admin/events');

    	}

    	return view('admin.event.add_edit_event')->with(compact('title','event'));
    }

    public function deleteEvent($id){
        //delete Event
        Event::where('id',$id)->delete();
        Session::flash('success_message','Event has been deleted Successfully');
            return redirect()->back();
    }
}
