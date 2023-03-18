@extends('layouts.hf')
@section('body-content')


<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Testimonials</h1>
          <span>testimonials from our greatest clients</span>
        </div>
      </div>
    </div>
  </div>
  <diV>
    <div class="callback-form contact-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a <em>Testimonials</em></h2><br>
              <h5>Feel free to send Testimonials about our company.</h5>
            </div>
          </div>
  <div class="col-md-12">
    <div class="contact-form">
      <form id="contact" action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <fieldset>
              <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
            </fieldset>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <fieldset>
              <input name="email" type="email" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
            </fieldset>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12">
            <fieldset>
              <input name="image" type="file" class="form-control" id="image" placeholder="image" required="">
            </fieldset>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <textarea name="testimonial" rows="6" class="form-control" id="testimonial" placeholder="Testimonials" required=""></textarea>
            </fieldset>
          </div>
          <div class="col-lg-12">
            <fieldset>
              <button type="submit" id="form-submit" class="filled-button">Send</button>
            </fieldset>
          </div>
        </div>
      </form>
    </div>
  </div>
  </diV>
  @php 
  use App\Models\testimonial;
  $testimonials = testimonial::all();
  @endphp
  @foreach($testimonials as $testimonial)
  <div class="testimonials" style="margin: 0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-testimonials owl-carousel">
            
            <div class="testimonial-item">
              <div class="inner-content">
                <h4>{{ $testimonial->name }}</h4>
                <span>{{ $testimonial->email }}</span>
                <p>{{ $testimonial->testimonial }}</p>
              </div>
              <img src="{{ asset($testimonial->image) }}" alt="">
            </div>
            

            
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>
      </div>
    </div>
  </diV>
  
  @endsection