@extends('layouts.front_layout.front_layout')
@section('content')
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">My Services</h2>
              </div>
            </div>
          </div>

        </div>
        
       
        <div class="row">
           @foreach($service_plans as $service_plan)
          <div class="col-md-4 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5">
            <div class="h-100 p-4 p-lg-5 site-block-feature-7">
              <span class="icon flaticon-picture display-3 text-primary mb-4 d-block"></span>
              <h3 class="text-white h4">{{$service_plan['type']}}</h3>
              <p>Range Photos  {{$service_plan['no_of_photos']}}</p>
              <p><strong class="font-weight-bold text-primary">Rs. {{$service_plan['price']}}</strong></p>
            </div>
          </div>  
          @endforeach       
        </div>
        
      </div>
    </div>

@endsection     