<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CmsPage;
use Session;
class CmsController extends Controller
{
    public function cms(){
    	Session::put('page','cms');
    	$cmsdata=CmsPage::where('status',1)->get();
    	//$cmsdata=json_decode(json_encode($cmsdata),true);
    	//echo "<pre>";print_r($cmsdata);die;
    	return view('admin.cms_pages.cms')->with(compact('cmsdata'));
    }

    public function addEditPages(Request $request, $id=null){
    	if($id==""){
    		$title="Add Page";
    		$page=new CmsPage;
    		$message="Page added Successfully!";
    	}else{
    		$title="Edit Page";
    		$page=CmsPage::find($id);
    		$message="Page updated Successfully!";
    	}

    	if($request->isMethod('post')){
    		$data=$request->all();
    		//echo "<pre>";print_r($data);die;
    		//brand validations
            $rules=[
                'page_name'=>'required|regex:/^[\pL\s\-]+$/u',                
            ];
            $customMessages=[
                'page_name.required'=>'Page Name is required',
                'page_name.regex'=>'Valid Page Name is required',               
            ];
            $this->validate($request,$rules,$customMessages);

            $page->title=$data['page_name'];
            $page->url=$data['url'];
            $page->description=$data['description'];
            $page->status=1;
            $page->save();

            Session::flash('success_message',$message);
            return redirect('admin/cms-pages');

    	}
    	return view('admin.cms_pages.add_edit_pages')->with(compact('title','page'));
    }


     public function deleteCmsPage($id){
        //delete CmsPage
        CmsPage::where('id',$id)->delete();
        Session::flash('success_message','CmsPage has been deleted Successfully');
            return redirect()->back();
    }
}
