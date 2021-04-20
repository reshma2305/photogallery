@extends('layouts.front_layout.front_layout')
@section('content')
<div class="row">
        @foreach($events as $event)
        <?php 
          $album_image_path='images/album_images/small/'.$event['album']['image'];
          $album_largeimage_path='images/album_images/medium/'.$event['album']['image'];
        ?>
        <div class="col-lg-4">

          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3">{{ $event['name']}}</h2>
              <a href="{{ url('/gallery'.$event['id'])}}" class="btn btn-outline-white py-2 px-4">More Photos</a>
            </div>

            <img src="{{$album_largeimage_path}}" alt="Image" class="img-fluid">
          </div>

        </div>
        @endforeach
</div>
@endsection