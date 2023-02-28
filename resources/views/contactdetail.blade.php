@extends('layouts.hf')
@section('body-content')
<!-- Page Content -->
 <div class="pageheading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Us</h1>
          <span>feel free to send us a message now!</span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-information">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="contact-item">
            <i class='bx bxs-phone-call'></i>
            <h4>Phone</h4>
            <p>You can connect with us.<br>Call us</p>
            <a href="#">+977 9818506171</a><br>
            <a href="#">+977 9818185671</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class="bx bxs-envelope"></i>
            <h4>Email</h4>
            <p>You can connect with us.<br>Email us</p>
            <a href="#">rentmyvehicle@gmail.com</a>
            <a href="#">khatiwaday356@gmail.com</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="contact-item">
            <i class='bx bx-current-location'></i>
            <h4>Location</h4>
            <p>You can visit our company also.<br>Visit us</p>
            <a href="#">Letang-2, Morang</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="callback-form contact-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Send us a <em>message</em></h2><br>
            <h5>Feel free to send us a message now!</h5>
          </div>
        </div>
        <div class="col-md-12">
          <div class="contact-form">
            <form id="contact" action="{{ route('contact.submit') }}" method="post">
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
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
  