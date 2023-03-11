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

  <div class="testimonials" style="margin: 0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-testimonials owl-carousel">
            
            <div class="testimonial-item">
              <div class="inner-content">
                <h4>George Walker</h4>
                <span>Chief Financial Analyst</span>
                <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>
            
            <div class="testimonial-item">
              <div class="inner-content">
                <h4>John Smith</h4>
                <span>Market Specialist</span>
                <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>
            
            <div class="testimonial-item">
              <div class="inner-content">
                <h4>David Wood</h4>
                <span>Chief Accountant</span>
                <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>
            
            <div class="testimonial-item">
              <div class="inner-content">
                <h4>Andrew Boom</h4>
                <span>Marketing Head</span>
                <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
  </diV>
  
  @endsection