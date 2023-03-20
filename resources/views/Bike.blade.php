@extends('layouts.hf')
@section('body-content')
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <div class="page header-text">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Bike</h1>
                    <span>You can rent or book different Bike from here.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <div class="row">
                @foreach ($bike as $bike)
                    <div class="col-md-4">
                        <div class="service-item">
                            <img src="{{ asset($bike->image) }} " alt="">
                            <div class="down-content">
                                <h4>Bike Name: {{ $bike->bikeName }}</h4>
                                <div style="margin-bottom:10px;">
                                    <span>Model: {{ $bike->model }} </span><br>
                                    Price for rent: Rs.{{ $bike->prize }} per day.</span>
                                </div>
                                <button id="payment-button">Pay with Khalti</button>
                                <a href="{{ route('detail', 1) }}" class="filled-button">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <br>
            </div>
        </div>
    </div>
    </div>

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
                            $.ajax({
                                type: "POST",
                                url: "{{ route('khalti.storePayment') }}",
                                data: {
                                    response: res,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(res) {
                                    console.log('transaction successfull');
                                }
                            });
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
                amount: 1000
            });
        }
    </script>
@endsection
