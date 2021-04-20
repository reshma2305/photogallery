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
              <li class="breadcrumb-item active">Event</li>
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
      	<form name="eventForm" id="eventForm" @if(empty($page['id'])) action="{{ url('admin/add-edit-pages')}}" @else action="{{ url('admin/add-edit-pages/'.$page['id'])}}" @endif method="post" enctype="multipart/form-data">@csrf
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
	                    <label for="brand_name">Title</label>
	                    <input type="text" class="form-control" name="page_name" id="page_name" @if(!empty($page['title'])) value="{{ $page['title']}}" @else value="{{ old('page_name')}}" @endif placeholder="Enter Page name">
	                </div>
                  <div class="form-group">
                      <label for="brand_name">CMS Page URL</label>
                      <input type="text" class="form-control" name="url" id="url" @if(!empty($page['title'])) value="{{ $page['url']}}" @else value="{{ old('url')}}" @endif placeholder="Enter Page name">
                  </div>   	               
	              </div>	
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="brand_name">Description</label>
                     <textarea name="description" id="description" class="textarea" style="width: 700px; height: 100px">{{ $page['description']}}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="brand_name">Status</label>
                       <input type="checkbox" name="status" id="status" value="1">
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