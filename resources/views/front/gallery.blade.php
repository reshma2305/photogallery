@extends('layouts.front_layout.front_layout')
@section('content')
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-6 ">
                <h2 class="site-section-heading text-right">Gallery</h2>
              </div>
              <div class="col-6 ">
                @foreach($albums as $album)
                <a href="{{ url('videos'.$album['event_id'])}}"><h2 class="site-section-heading text-right">Videos</h2></a>
                @endforeach
              </div>
            </div>
          </div>
          <!-- <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-12 ">
                @foreach($albums as $album)
                <a href="{{ url('videos'.$album['event_id'])}}"><h2 class="site-section-heading text-right">Videos</h2></a>
                @endforeach
              </div>
            </div>
          </div>
 -->
        </div>
        <div class="row" id="lightgallery">
          @foreach($albums as $album)
          @foreach($album['images'] as $image)
          <?php 
            $album_image_path='images/album_images/medium/'.$image['image'];
           
            $album_largeimage_path='images/album_images/large/'.$image['image'];
             //echo $album_largeimage_path."string";
          ?>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="{{ asset($album_image_path) }}" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor doloremque hic excepturi fugit, sunt impedit fuga tempora, ad amet aliquid?</p>">
            <a href="#"><img src="{{ asset($album_image_path) }}"  alt="IMage" class="img-fluid"></a>
          </div>
          @endforeach
          @endforeach
        </div>
      </div>
    </div>

  

   @endsection 

    
    
 