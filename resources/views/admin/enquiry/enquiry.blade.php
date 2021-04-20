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
              <li class="breadcrumb-item active">Enquiry</li>
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
              <h3 class="card-title">Enquiry</h3>
               <a href="{{ url('admin/old-enquiry-data')}}" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Old Enquiry Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sections" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>                  
                  <th>Message</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
               @foreach($enquries as $enquriry)
                <tr>
                  <td>{{$enquriry->id}}</td>
                  <td>{{$enquriry->fname}} {{$enquriry->lname}}</td>
                  <td>{{$enquriry->email}}</td>
                  <td>{{$enquriry->subject}}</td>
                  <td>{{$enquriry->message}}</td>
                  <td>{{$enquriry->created_at}}</td>
                  <td>@if($enquriry->status=='1')
                  		<a class="updateEnquiryStatus" id="enquriry-{{ $enquriry->id}}" enquiry_id="{{$enquriry->id}}" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  		@else
                  		<a class="updateEnquiryStatus" id="enquriry-{{ $enquriry->id}}" enquiry_id="{{$enquriry->id}}" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  		@endif
                  </td>
                
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>                  
                  <th>Message</th>
                  <th>Created at</th>
                  <th>Status</th>
                 <!--  <th>Actions</th> -->
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