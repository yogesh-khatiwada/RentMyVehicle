@extends('layouts.hf')
@section('body-content')

    <body>


        <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="main-banner header-text" id="top">
            <div class="Modern-Slider">
                <!-- Item -->
                <div class="item item-1">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>Here, You Can find Best Vehicle For Rent</h6>

                            <p>Search quick a get best vehicle in rent. If you have any queries then contact us below.</p>
                            <a href="/contactdetail" class="filled-button">contact us</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-2">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>Here, You Can find Best Vehicle For Rent</h6>
                            <p>You can find different vehicle so, book quickly and enjoy it.</p>

                            <a href="/Car" class="filled-button">Car</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-3">
                    <div class="img-fill">
                        <div class="text-content">
                            <h6>Here, You Can find Best Vehicle For Rent</h6>

                            <p>Here, You can find best vehicle for rent so click offer below to get more offere also.</p>
                            <a href="/offer" class="filled-button">Offers</a>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
            </div>
        </div>
        <!-- Banner Ends Here -->

        <div class="request-form">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <h4>IF YOU HAVE ANY QUERIES RELATED TO RENT?</h4>

                        <p>Click the contact and contact us to get quick response.</p>
                    </div>
                    <div class="col-md-4">
                        <a href="/contactdetail" class="border-button">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Our <em>Offers</em></h2>
                            <span>We offer you different kind of vehicle.</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        {{-- @foreach ($offers as $offer)  --}}
                        <div class="service-item">

                            <img src="{{ asset('frontend/images/offer-1-720x480.jpg') }}" alt="">
                            <div class="down-content">
                                <h5> Car Name: <span>Audi </span></h5>
                                <div style="margin-bottom:10px;">
                                    <span>Car Model: A4 </span><br>
                                    Price for rent: RS.<span>7600 per day</span>

                                </div>

                                {{-- <a href="{{ route('detail',1) }}" class="filled-button">Book Now</a> --}}
                                <a href="/offer" class="filled-button">Book Now</a>
                            </div>
                        </div>

                        <br>
                        {{-- @endforeach --}}
                    </div>
                    <div class="col-md-4">
                        {{-- @foreach ($offers as $offer)  --}}
                        <div class="service-item">

                            <img src="{{ asset('frontend/images/offer-2-720x480.jpg') }}" alt="">
                            <div class="down-content">
                                <h5> Car Name: <span>Tesla</span></h5>
                                <div style="margin-bottom:10px;">
                                    <span>Car Model: Model S </span><br>
                                    Price for rent: RS.<span>7600 per day</span>

                                </div>

                                <a href="/offer" class="filled-button">Book Now</a>
                            </div>
                        </div>

                        <br>
                        {{-- @endforeach --}}
                    </div>
                    <div class="col-md-4">
                        {{-- @foreach ($offers as $offer)  --}}
                        <div class="service-item">

                            <img src="{{ asset('frontend/images/offer-3-720x480.jpg') }}" alt="">
                            <div class="down-content">
                                <h5> Car Name: <span>Nissan</span></h5>
                                <div style="margin-bottom:10px;">
                                    <span>Car Model: GT-R </span><br>
                                    Price for rent: RS.<span>76000 per day</span>

                                </div>

                                <a href="/offer" class="filled-button">Book Now</a>
                            </div>
                        </div>

                        <br>
                        {{-- @endforeach --}}
                    </div>

                </div>

            </div>
        </div>

        <div class="fun-facts">
            <div class="container">
                <div class="more-info-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-image">

                                <img src="{{ asset('frontend/images/about-1-570x350.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="right-content">
                                <span>Who we are</span>
                                <h2>Get to know about <em>our company</em></h2>
                                <p>Let join us quickly.</P>

                                <a href="/register" class="filled-button">Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="more-info">
            <div class="container">
                <div class="section-heading">
                    <h2>Read our <em>Blog</em></h2>
                    <span>Different kind of blog in our vehicle rent system.</span>
                </div>

                <div class="row" id="tabs">
                    <div class="col-md-4">
                        <ul>
                            <li><a href='#tabs-1'> <small>Yogesh Khatiwada &nbsp;|&nbsp; 27.9.2023 10:10</small></a></li>
                            <li><a href='#tabs-2'> <small>Bijesh Sharma &nbsp;|&nbsp; 27.10.2023 7:10</small></a></li>
                            <li><a href='#tabs-3'> <small>Gyabak Sharma &nbsp;|&nbsp; 01.11.2020 9:10</small></a></li>
                        </ul>

                        <br>

                        {{-- <div class="text-center">
              <a href="/blog" class="filled-button">Read More</a>
            </div> --}}

                        <br>
                    </div>

                    <div class="col-md-8">
                        <section class='tabs-content'>
                            <article id='tabs-1'>

                                <img src="{{ asset('frontend/images/cbr.jpg') }}" alt="">
                                <h4><a href="">HONDA CBR600RR.<br>Born to Race. Bred to Win
                                    </a></h4>
                                <p>The 600cc super bike, Honda CBR600RR is powered by Race-Ready liquid cooled DOHC 16-valve
                                    inline four-cylinder power plant.Inspired by ultimate racing machine Honda RC213V,
                                    CBR600RR is offers perfect balance of high-revving power, precise handling.CBR600RR
                                    evolve into one of the most polished packages ever produced in the Super Sports arena.
                                </p>
                            </article>
                            <article id='tabs-2'>

                                <img src="{{ asset('frontend/images/mustang.jpg') }}" alt="">
                                <h4><a href="">Ford Mustang GT</a></h4>
                                <p>Ford Mustang is one of the most popular sports cars in the world and now finally, it has
                                    arrived in Nepal. GO Automobiles, the official distributor of Ford Cars in Nepal, is
                                    going to soft launch Ford Mustang GT Fastback 2018 in the Nepali market on this Friday
                                    at its showroom located at Chabahil, Kathmandu. The Ford Mustang GT price in Nepal is
                                    set Rs. 1,70,00,000, (1.7 Cr) which is less than what we expected</p>
                            </article>
                            <article id='tabs-3'>

                                <img src="{{ asset('frontend/images/vr.png') }}" alt="">
                                <h4><a href="">Hartford VR 223</a></h4>
                                <p>Probably the most famous bike of its generation, Hartford VR is one of the very first
                                    dirt bikes that made its way to Nepal. Since this was a new segment here, it rose to
                                    popularity in no time. There are still many people who follow Harford’s VR to this day.
                                </p>
                            </article>
                        </section>
                    </div>
                </div>


            </div>
        </div>

        <div class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>What they say <em>about our rent my vehicle company?</em></h2>
                            <span>Testimonials from our user</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="owl-testimonials owl-carousel">

                            <div class="testimonial-item">
                                <div class="inner-content">
                                    <h4>Ang mingma Sherpa</h4>
                                    <img src="{{ asset('frontend/images/ming.png') }}" alt="">

                                    <p>Thank you so much for providing best bike. All the service are better than other
                                        company."</p>
                                </div>


                            </div>

                            <div class="testimonial-item">
                                <div class="inner-content">
                                    <h4>Saroj Subedi</h4>
                                    <img src="{{ asset('frontend/images/saroj.png') }}" alt="">
                                    <p>Thank you so much for providing best bike. All the service are better than other
                                        company.</p>
                                </div>

                            </div>





                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="callback-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Request a <em>call back</em></h2>
                            <span>Quick send us message to known anything about us.</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form">
                            <form id="contact" action="{{ route('message.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name"
                                                placeholder="Full Name" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="email" type="text" class="form-control" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input name="subject" type="text" class="form-control" id="subject"
                                                placeholder="Subject" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                                                required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="border-button">Send
                                                Message</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
            </div>
        </div>


        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/63f85bb531ebfa0fe7ef09e3/1gq12cg0c';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    @endsection
