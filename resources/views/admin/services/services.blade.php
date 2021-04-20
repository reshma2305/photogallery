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
              <li class="breadcrumb-item active">Service</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    {{ Session::get('success_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Service</h3>
              <a href="{{ url('admin/add-edit-service')}}" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Add Service</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="service" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Event Name</th>
                  <th>No of Photos</th>
                  <th>Price</th>                  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
               @foreach($services as $service)              
                <tr>
                  <td>{{$service->id}}</td>                                             
                  <td>{{$service->event['name']}}</td>
                  <td>{{$service->no_of_photos}}</td>
                  <td>{{$service->price}}</td>                                                     
                  <td>@if($service->status=='1')
                      <a class="updateServiceStatus" id="service-{{ $service->id}}" service_id="{{$service->id}}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                      @else
                      <a class="updateServiceStatus" id="service-{{ $service->id}}" service_id="{{$service->id}}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                      @endif
                  </td>

                  <td>                                    
                    <a title="Edit Album" href="{{ url('admin/add-edit-service/'.$service->id)}}"><i class="fas fa-edit"></i></a>
                    &nbsp;&nbsp;          
                   <a title="Delete Album" href="javascript:void(0)" class="confirmDelete" record="service" recordid="{{ $service->id}}"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Event Name</th>
                  <th>No Of Photos</th>
                  <th>Price</th>                  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection