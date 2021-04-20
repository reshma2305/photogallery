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
              <li class="breadcrumb-item active">Products</li>
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
      	<form name="albumForm" id="albumForm" @if(empty($albumData['id'])) action="{{ url('admin/add-edit-album')}}" @else action="{{ url('admin/add-edit-album/'.$albumData['id'])}}" @endif method="post"  enctype="multipart/form-data">@csrf
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
	                  <label>Select Event</label>
	                  <select name="event_id" id="event_id" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                   @foreach($events as $event)
	                   <option value="{{ $event['id'] }}" @if(!empty($albumData['event_id']) && $albumData['event_id']==$event['id']) selected="" @endif>{{$event['name']}}<option>
	                   	@endforeach
	                  </select>
	               	</div> 	
	               	<div class="form-group">
	                    <label for="url">Url</label>
	                    <input type="text" class="form-control" name="url" id="url" @if(!empty($albumData['url'])) value="{{ $albumData['url']}}" @else value="{{ old('url')}}" @endif placeholder="Enter Product name">
	                </div> 		              	
	               	
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="title">Title</label>
	                    <input type="text" class="form-control" name="title" id="title" @if(!empty($albumData['title'])) value="{{ $albumData['title']}}" @else value="{{ old('title')}}" @endif placeholder="Enter Product name">
	                </div> 
	              	<div class="form-group">
	                    <label for="description">Description</label>
	                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter..">@if(!empty($albumData['description'])) {{ $albumData['description']}} @else {{ old('description')}} @endif</textarea>
	                </div> 	                
	              </div>
	    
	           
	            </div>
	            <div class="row">
	              <div class="col-12 col-sm-6">
	              	  <div class="form-group">
	                    <label for="image">Main Image</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="image" name="image">
	                        <label class="custom-file-label" for="image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                  	</div>	 
	                  	@if(!empty($albumData['image']))
	                      	<div><img style="height: 60px;margin-top: 5px" src="{{ asset('images/album_images/small/'.$albumData['image'])}}">&nbsp; 
	                      	<a href="{{ url('admin/delete-album-image/'.$albumData['id'])}}">Delete Image</a> 
	                      <!-- 	<a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="{{$albumData['id']}}">Delete Image</a> -->
	                      </div>
	                    @endif	                 	                                 
	                </div>           	              	                	                
	              </div>
	              
	            </div>
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>
	        </div>
    	</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection