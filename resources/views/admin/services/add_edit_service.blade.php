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
              <li class="breadcrumb-item active">Services</li>
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
      	<form name="albumForm" id="albumForm" @if(empty($serviceData['id'])) action="{{ url('admin/add-edit-service')}}" @else action="{{ url('admin/add-edit-service/'.$serviceData['id'])}}" @endif method="post"  enctype="multipart/form-data">@csrf
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
	                   <option value="{{ $event['id'] }}" @if(!empty($serviceData['event_id']) && $serviceData['event_id']==$event['id']) selected="" @endif>{{$event['name']}}<option>
	                   	@endforeach
	                  </select>
	               	</div> 	
	               	<div class="form-group">
	                    <label for="no_of_photos">No of Photos Range</label>
	                    <input type="text" class="form-control" name="no_of_photos" id="no_of_photos" @if(!empty($serviceData['no_of_photos'])) value="{{ $serviceData['no_of_photos']}}" @else value="{{ old('no_of_photos')}}" @endif placeholder="Enter Product name">
	                </div> 		              	
	               	
	              </div>
	              <div class="col-md-6">
	              	
                   <div class="form-group">
                      <label for="type">Type of Plan</label>
                      <select name="type" id="type" class="form-control select2" style="width: 100%;">
                      <option value="">Select</option>
                      <option value="Basic">Basic</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Advance">Advance</option>
                    </select>
                     
                  </div>                    
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" @if(!empty($serviceData['price'])) value="{{ $serviceData['price']}}" @else value="{{ old('price')}}" @endif placeholder="Enter Product name">
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