@extends('layouts.hf')
@section('body-content')
<!-- Page Content -->
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Offers</h1>
          <span>we offer you different kind of car and bike.</span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        @foreach($offers as $offer)
        <div class="col-md-4">
          <div class="service-item">
         
            <img src="{{ asset($offer->image) }}" alt="">
            <div class="down-content">
              <h4>Vehicle Name: {{ $offer->vehicleName }}.</h4>
              <div style="margin-bottom:10px;">
                <span>Model: {{ $offer->model }} </span><br>
                <span>Price for rent: Rs.{{ $offer->prize }} per day</span>
              </div>
              
              <a href="{{ route('detail',1) }}" class="filled-button">Book Now</a>
            </div>
          </div>

          <br>
        </div>
       
    

       

        @endforeach 

       
      </div>

      <br>
      <br>

      <nav>
        <ul class="pagination pagination-lg justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">«</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">»</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>

      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
  @endsection