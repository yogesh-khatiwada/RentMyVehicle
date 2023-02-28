@extends('layouts.hf')
@section('body-content')

<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Team</h1>
          <span>Our professional team members</span>
        </div>
      </div>
    </div>
  </div>

  <div class="team" style="margin: 0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our team <em>members</em></h2>
            <span>Suspendisse a ante in neque iaculis lacinia</span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-item">
            <img src="{{ asset('frontend/images/yogeshg.jpg') }}" alt="">
            <div class="down-content">
              <h4>Yogesh Khatiwada</h4>
              <span>CEO</span>
              <p>Excellent leadership skills, the ability to motivate and inspire employees, and strong communication and interpersonal skills.</p>

              <p>
                <a href="#"><span><i class="fa fa-linkedin"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-item">
            <img src="{{ asset('frontend/images/bijesh.jpg') }}" alt="">
            <div class="down-content">
              <h4>Bijesh Sharma Dhimal</h4>
              <span>Chief Marketing Officer</span>
              <p>Promoting the company's brand and products to customers, as well as developing and implementing marketing campaigns to increase awareness and drive sales.</p>
              <p>
                <a href="#"><span><i class="fa fa-linkedin"></i></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-item">
            <img src="{{ asset('frontend/images/gyabakg.jpg') }}" alt="">
            <div class="down-content">
              <h4>Suman Tamang</h4>
              <span>Financial Analyst</span>
              <p>Analyzing and interpreting financial data, and using this information to inform business decisions and support the company's strategic goals.</p>
              <p>
                <a href="#"><span><i class="fa fa-linkedin"></i></span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection