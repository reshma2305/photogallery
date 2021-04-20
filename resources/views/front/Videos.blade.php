@extends('layouts.front_layout.front_layout')
@section('content')
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">Videos</h2>
              </div>
            </div>
          </div>
    

        </div>
        <div class="row">
          @foreach($albumVideos as $albumVideo)
          @foreach($albumVideo['videos'] as $video)
          <?php 
            $album_image_path='videos/event_videos/'.$video['video'];
           
            $album_largeimage_path='videos/event_videos/'.$video['video'];
             //echo $album_largeimage_path."string";
          ?>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item">
            <a href="#"><video width="400" height="440" controls preload="metadata">
              <source src="{{URL::asset($album_image_path)}}" type="video/mp4">
            </video></a>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>
    </div>

    

   @endsection 

    
    
 