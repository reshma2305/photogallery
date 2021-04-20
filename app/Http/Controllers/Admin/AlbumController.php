<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Album;
use Session;
use App\Event;
use Image;
use App\AlbumsImage;

class AlbumController extends Controller
{
    public function album(){
    	Session::put('page','album');
    	$albums=Album::with('event')->get();
    	//$albums=json_decode(json_encode($albums));
    	//echo "<pre>";print_r($albums); die;
    	return view('admin.albums.albums')->with(compact('albums'));
    }

    public function updateAlbumStatus(Request $request){
    	if($request->ajax()){
    		$data=$request->all();
    		//echo "<pre>";print_r($data); die;
    		if($data['status']=="Active"){
    			$status=0;
    		}else{
    			$status=1;
    		}
    		Album::where('id',$data['album_id'])->update(['status'=>$status]);
    		return response()->json(['status'=>$status,'album_id'=>$data['album_id']]);
    	}
    }

     public function deleteAlbum($id){
        //delete Product
        Album::where('id',$id)->delete();
        Session::flash('success_message','Album has been deleted Successfully');
            return redirect()->back();
    }

    public function addEditAlbum(Request $request ,$id=null){
    	if($id==""){
    		$title="Add Album";
            $album= new Album;
            $albumData=array();
            $message="Album added Successfully!";
    	}else{
    		$title="Edit Album";
            $albumData=Album::find($id);
            $albumData=json_decode(json_encode($albumData),true);
            //echo "<pre>";print_r($albumData);die;
            $album=Album::find($id);
            $message="Album updated Successfully!";
    	}

    	if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>";print_r($data); die;

            //albumalbum validations
            $rules=[
                'event_id'=>'required',
                'url'=>'required',                              
            ];
            $customMessages=[
                'event_id.required'=>'Event is required',
                'url.required'=>'Url is required',                
            ];
            $this->validate($request,$rules,$customMessages);

            //upload albumalbum image
            if($request->hasFile('image')){
                $image_tmp=$request->file('image');
                if($image_tmp->isValid()){
                    //upload images after Resize
                    $image_name=$image_tmp->getClientOriginalName();
                    $extension=$image_tmp->getClientOriginalExtension();
                    $imageName=$image_name.'-'.rand(111,99999).'.'.$extension;
                    $large_image_path='images/album_images/large/'.$imageName;
                    $medium_image_path='images/album_images/medium/'.$imageName;
                    $small_image_path='images/album_images/small/'.$imageName;
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(900,874)->save($medium_image_path);
                    Image::make($image_tmp)->resize(260,300)->save($small_image_path);
                    $album->image=$imageName;
                }
            }
            //save album details in products table            
            $album->event_id=$data['event_id'];
            $album->title=$data['title'];
            $album->description=$data['description'];
            $album->url=$data['url'];       
            $album->status=1;
            $album->save();
            Session::flash('success_message',$message);
            return redirect('admin/albums');
        }
    
    	//get all events
        $events=Event::where('status',1)->get();
        $events=json_decode(json_encode($events),true);
        //echo "<pre>";print_r($events); die;


        return view('admin.albums.add_edit_album')->with(compact('title','events','albumData'));
    }

    public function deleteAlbumImage($id){
        //get product image
        $albumImage=Album::select('image')->where('id',$id)->first();

        //get product image path
        $small_image_path='images/album_images/small/';
        $medium_image_path='images/album_images/medium/';
        $large_image_path='images/album_images/large/';

        //delete product medium image if exists in medium folder
        if(file_exists($small_image_path.$albumImage->image)){
            unlink($small_image_path.$albumImage->image);
        }
        //delete product large image if exists in large folder
        if(file_exists($medium_image_path.$albumImage->image)){
            unlink($medium_image_path.$albumImage->image);
        }

        //delete product small image if exists in small folder
        if(file_exists($large_image_path.$albumImage->image)){
            unlink($large_image_path.$albumImage->image);
        }

        //delete product image from products table
        Album::where('id',$id)->update(['image'=>'']);

        Session::flash('success_message','Album image has been deleted Successfully');
            return redirect()->back();
    }

    public function addImages(Request $request, $id){
    	if($request->isMethod('post')){  
            $data=$request->all();    
            // echo "<pre>";print_r($data); die;
            if($request->hasFile('images')){
                $images=$request->file('images');
                //echo "<pre>";print_r($images); die;
                foreach ($images as $key => $image) {
                   $albumImage=new AlbumsImage;
                   $image_tmp=Image::make($image);
                   $extension=$image->getClientOriginalExtension();
                   $imageName=rand(111,999999).time().".".$extension;
                   //echo "<pre>";print_r($imageName); die;
                   $large_image_path='images/album_images/large/'.$imageName;
                    $medium_image_path='images/album_images/medium/'.$imageName;
                    $small_image_path='images/album_images/small/'.$imageName;
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(260,300)->save($small_image_path);

                    $albumImage->image=$imageName;
                    $albumImage->album_id=$id;
                    $albumImage->event_id=$data['event_id'];
                    $albumImage->status=1;
                    $albumImage->save();
                }
                $message="Album Images has been added Successfully!";
                Session::flash('success_message',$message);
                return redirect()->back();
            }
        }
    	$AlbumData=Album::select('id','event_id','title','image')->with('images','event')->find($id);
        $AlbumData=json_decode(json_encode($AlbumData),true);
        //echo "<pre>";print_r($AlbumData); die;
        $title="Album Images";
        return view('admin.albums.add_images')->with(compact('AlbumData','title'));
    }

    public function updateImageStatus(Request $request){
        if($request->ajax()){
            $data=$request->all();
            //echo "<pre>";print_r($data); die;
            if($data['status']=="Active"){
                $status=0;
            }else{
                $status=1;
            }
            AlbumsImage::where('id',$data['image_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'image_id'=>$data['image_id']]);
        }
    }

    public function deleteImage($id){
        //get product image
        $albumImage=AlbumsImage::select('image')->where('id',$id)->first();

        //get product image path
        $small_image_path='images/album_images/small/';
        $medium_image_path='images/album_images/medium/';
        $large_image_path='images/album_images/large/';

        //delete product medium image if exists in medium folder
        if(file_exists($small_image_path.$albumImage->image)){
            unlink($small_image_path.$albumImage->image);
        }
        //delete product large image if exists in large folder
        if(file_exists($medium_image_path.$albumImage->image)){
            unlink($medium_image_path.$albumImage->image);
        }

        //delete product small image if exists in small folder
        if(file_exists($large_image_path.$albumImage->image)){
            unlink($large_image_path.$albumImage->image);
        }

        //delete product image from products table
        AlbumsImage::where('id',$id)->delete();

        Session::flash('success_message','Album image has been deleted Successfully');
            return redirect()->back();
    }


    // Add album videos
    public function addVideos(Request $request, $id){
        if($request->isMethod('post')){  
            $data=$request->all();    
             //echo "<pre>";print_r($data); die;
            //upload Event video
             if($request->hasFile('video')){
                $video_tmp=$request->file('video');
                //echo "<pre>";print_r($images); die;
                
                foreach ($video_tmp as $key => $video) {
                   $albumVideo=new AlbumsImage;
                    $video_name=$video->getClientOriginalName();
                    $extension=$video->getClientOriginalExtension();
                    $videoName=rand().'.'.$extension;
                    $video_path='videos/event_videos/';
                    $video->move($video_path,$videoName);
                    $albumVideo->video=$videoName;

                    $albumVideo->album_id=$id;
                    $albumVideo->event_id=$data['event_id'];
                    $albumVideo->status=1;
                    $albumVideo->save();
                }
            
                $message="Album Videos has been added Successfully!";
                Session::flash('success_message',$message);
                return redirect()->back();
            }


        }
        $AlbumData=Album::select('id','event_id','title','image')->with('event','videos')->find($id);
        $AlbumData=json_decode(json_encode($AlbumData),true);
        //echo "<pre>";print_r($AlbumData); die;
        $title="Album Videos";
        return view('admin.albums.add_videos')->with(compact('AlbumData','title'));
    }
}
