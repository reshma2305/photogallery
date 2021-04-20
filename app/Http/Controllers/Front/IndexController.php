<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\Album;
use App\Admin;
use App\CmsPage;
use App\Service;

class IndexController extends Controller
{
    public function index(){

    	$events=Event::with('album')->where('status',1)->get()->toArray();
    	//echo "<pre>";print_r($events);die;
    	$albums=Album::with('images')->get()->toArray();
    	//echo "<pre>";print_r($albums);die;

    	$adminDetail=Admin::where('status',1)->get()->toArray();
    	//echo "<pre>";print_r($adminDetail);die;

    	$cmsdetail=CmsPage::where('status',1)->get()->toArray();
    	//echo "<pre>";print_r($cmsdetail);die;

    	return view('front.index')->with(compact('events','albums','adminDetail','cmsdetail'));
    }

    public function gallery($id){
        $albums=Album::with('images')->where('event_id',$id)->get()->toArray();
        //echo "<pre>";print_r($albums);die;
        return view('front.gallery')->with(compact('albums'));
    }

    public function Videos($id){
        $albumVideos=Album::with('videos')->where('event_id',$id)->get()->toArray();
        //echo "<pre>";print_r($albumVideos);die;
        return view('front.Videos')->with(compact('albumVideos'));
    }

    public function aboutus(){
        $aboutus=CmsPage::where('status',1)->get()->toArray();
        //echo "<pre>";print_r($aboutus);die;
        $adminDetail=Admin::where('status',1)->get()->toArray();
        //echo "<pre>";print_r($adminDetail);die;
        return view('front.about_us')->with(compact('aboutus','adminDetail'));
    }

    public function service(){

        $services=Event::where('status',1)->get()->toArray();
        //echo "<pre>";print_r($services);die;
        return view('front.service')->with(compact('services'));
    }
    public function servicePlans($id){

        $service_plans=Service::with('event')->where('event_id',$id)->get()->toArray();
        //echo "<pre>";print_r($service_plans);die;
        return view('front.service_plans')->with(compact('service_plans'));
    }
}
