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
              <li class="breadcrumb-item active">Events</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->
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
              <h3 class="card-title">Events</h3>
              <a href="{{ url('admin/add-edit-event')}}" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Add Event</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sections" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
               @foreach($events as $event)
                <tr>
                  <td>{{$event->id}}</td>
                  <td>{{$event->name}}</td>
                  <td>@if($event->status=='1')
                  		<a class="updateEventStatus" id="event-{{ $event->id}}" event_id="{{$event->id}}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  		@else
                  		<a class="updateEventStatus" id="event-{{ $event->id}}" event_id="{{$event->id}}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  		@endif
                  </td>
                  <td>                   
                    <a title="Edit Event" href="{{ url('admin/add-edit-event/'.$event->id)}}"><i class="fas fa-edit"></i></a>
                    &nbsp;&nbsp;          
                   <a title="Delete Event" href="javascript:void(0)" class="confirmDelete" record="event" recordid="{{ $event->id}}"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
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