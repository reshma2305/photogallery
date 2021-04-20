@extends('layouts.admin_layout.admin_layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Event Videos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	 @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    {{ Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    {{ Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
      	<form name="addImageForm" id="addImageForm" method="post" action="{{ url('admin/add-videos/'.$AlbumData['id'])}}" enctype="multipart/form-data">@csrf
          <input type="hidden" name="album_id" value="{{ $AlbumData['id'] }}">
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title">{{$title}}</h3>

	            <div class="card-tools">
	              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
	            </div>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body">
	            <div class="row">           	              	
	              	<div class="col-md-6">	
                    <div class="form-group">
                        <label for="product_name">Event :</label>
                        <input type="hidden" name="event_id" value="{{ $AlbumData['event']['id']}}">
                        &nbsp;
                        {{ $AlbumData['event']['name']}}
                    </div>               	 	
		              	<div class="form-group">
		                    <label for="product_name">Title :</label>&nbsp;
		               			{{ $AlbumData['title']}}
		                </div> 	               		              	                   
	              </div>
	             
	              <div class="col-md-6">	                
				        	<div class="form-group">	                   
                    	<div><img style="height: 130px;" src="{{ asset('images/album_images/small/'.$AlbumData['image'])}}">&nbsp; 
                    	</div>	                  		                                      
	                </div>
	              </div>
                <div class="col-md-6">                  
                  <div class="form-group">                     
                     <div class="field_wrapper">
                      <div>
                          <input type="file" name="video[]" id="video" value="" style="width:120px" required="" multiple="" />                          
                      </div>
                  </div>                                                            
                  </div>
                </div>
	            </div>
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Add Videos</button>
	          </div>
	        </div>
    	</form>

      <form name="editImageForm" id="editImageForm" method="post" action="{{ url('admin/edit-images/'.$AlbumData['id'])}}">@csrf
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Added Event Videos</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Products" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Video</th>                 
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($AlbumData['videos'] as $video)   
                
                <tr>
                  <td>{{$video['id'] }}</td>                               
                  <td>
                    <video width="20%" controls> 
                      <source src="{{ asset('videos/event_videos/'.$video['video']) }}" type="video/mp4"> 
                        Your browser does not support the video tag. 
                   </video> 
                  </td>
                              
                  <td>@if($video['status']=='1')
                      <a class="updateVideoStatus" id="video-{{ $video['id']}}" video_id="{{$video['id']}}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                      @else
                      <a class="updateVideoStatus" id="video-{{ $video['id']}}" video_id="{{$video['id']}}" href="javascript:void(0)"> <i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                      @endif
                      &nbsp;&nbsp;
                      <a title="Delete Video" href="javascript:void(0)" class="confirmDelete" record="video" recordid="{{ $video['id']}}"><i class="fas fa-trash"></i></a>
                  </td>                 
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Video</th>                 
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>

            
            <!-- /.card-body -->
        </div>
      </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection