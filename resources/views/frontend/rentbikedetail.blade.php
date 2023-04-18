@extends('layouts.hf')

@section('body-content')
    <section>
        <div class="container">
            <h1>bike Detail</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-12">
                    <img src="{{ asset($bike->image) }}" alt="" width="100%">

                    <h5> bike Name: <span>{{ $bike->bikeName }}</span></h5>

                    <div style="margin-bottom:10px;">
                        <span>bike Model: {{ $bike->model }} </span><br>
                        Price for rent: RS.<span>{{ $bike->prize }} per day</span>
                    </div>
                </div>
                <div class="col-md-8 col-12">

                    {{-- <a href="" class="btn btn-dark btn-block">Apply Now</a> --}}
                    <h1>Rent Now</h1>
                    <hr>
                    @if (Auth::user())
                        <form action="{{ route('bike.rent.store', $bike->id) }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <strong>Error: </strong> {{ $error }}
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="name"
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email"
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="phone"
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted"> </small>
                            </div>
                            <div class="form-group">
                                <label for="address">Temporary address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="address" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>

                            </div>
                            <div class="form-group">
                                <label for="address">Permanent address</label>
                                <input type="text" name="paddress" id="paddress" class="form-control"
                                    placeholder="address" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>

                            </div>

                            <div class="form-group">
                                <label for="resume">resume</label>
                                <input type="file" name="resume" id="resume" class="form-control"
                                    placeholder="resume" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="citizenship"> citizenship front</label>
                                <input type="file" name="citizenship" id="citizenship" class="form-control"
                                    placeholder="resume" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label for="citizenshipb">citizenship back</label>
                                <input type="file" name="citizenshipb" id="citizenshipb" class="form-control"
                                    placeholder="resume" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                            <div class="form-group d-none">
                                <label for="totalprice">Price </label>
                                <input type="integer" value="{{ $bike->prize }}" style="display:none" name="totalprice"
                                    id="totalprice" class="form-control" placeholder="price" aria-describedby="helpId">
                                <small id="helpId" class="text-muted"></small>
                            </div>
                            <div>
                                <button type="button" id="payment-button">Pay with Khalti</button>
                            </div>
                            {{-- <a href="{{ route('bike.detail',$bike->id) }}" class="btn btn-dark">Rent</a> --}}
                            <div>
                                <br>
                                <button type="submit" id="myButton" style="display:none" class="btn btn-info"
                                    href="/rent" role="button">Rent</button>
                            </div>
                            <script>
                                // Assuming you have a button with an ID of "myButton"
                                let myButton = document.getElementById("myButton");

                                function onSuccess() {
                                    // Change the button type to "submit"
                                    myButton.type = "submit";
                                }

                                // Call the onSuccess function when your operation is successful
                                onSuccess();
                            </script>
                            <br>
                        </form>
                    @else
                        <div class="jumbotron">
                            <h4>Login first for rent a vehicle.</h4>

                            <p class="lead">
                                <a class="btn btn-primary btn-md" href="{{ route('login') }}" role="button">Login</a>
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "{{ config('app.khalti_public_key') }}",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verfication
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('khalti.verifyPayment') }}",
                        data: {
                            token: payload.token,
                            amount: payload.amount,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            // $.ajax({
                            //     type: "POST",
                            //     url: "{{ route('khalti.storePayment') }}",
                            //     data: {
                            //         response: res,
                            //         "_token": "{{ csrf_token() }}"
                            //     },
                            //     success: function(res) {
                            //         console.log('transaction successfull');
                            //     document.getElementById('myButton').style.display='block';
                            //     }
                            // });
                            document.getElementById('myButton').style.display = 'block';
                            console.log(res);
                        }
                    });
                    console.log(payload);
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function() {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({
                // amount: 1000
                amount: {{ $bike->prize * 100 }}
            });
        }
    </script>
@endsection
