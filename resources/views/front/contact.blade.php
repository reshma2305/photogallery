@extends('layouts.front_layout.front_layout')
@section('content')
    <div class="site-section"  data-aos="fade">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">Contact</h2>
              </div>
            </div>
          </div>

        </div>
        
        <div class="row">
          <div class="col-lg-8 mb-5">
            @if(Session::has('flash_message_success'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{!! session('flash_message_success') !!}</strong>
              </div>
            @endif 

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
           <form action="{{ url('/contact')}}" id="contact-form" name="contact-form" method="post">
                {{ csrf_field() }}
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-white" for="fname">First Name</label>
                  <input type="text" id="fname"  name="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-white" for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="subject">Subject</label> 
                  <input type="subject" id="subject" name="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-white" for="message">Message</label> 
                  <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>


            </form>
          </div>
          <div class="col-lg-3 ml-auto">
            @foreach($adminDetails as $admin)
            <div class="mb-3">
              <p class="mb-0 font-weight-bold text-white">Address</p>
              <p class="mb-4">{{ $admin['Address']}}</p>

              <p class="mb-0 font-weight-bold text-white">Phone</p>
              <p class="mb-4"><a href="#">{{ $admin['mobile']}}</a></p>

              <p class="mb-0 font-weight-bold text-white">Email Address</p>
              <p class="mb-0"><a href="#">{{ $admin['email']}}</a></p>

            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

@endsection 