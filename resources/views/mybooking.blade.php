@extends('layouts.hf')
@section('body-content')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .even-row {
            background-color: #f2f2f2;
        }

        .cnt {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            background-color: black;
            margin-button: 200px;
        }

        .mt-5,
        .my-5 {
            margin-top: 6rem !important;
        }
    </style>

    <div class="container-fluid mt-5">


        <div class="card pt-lg-3">



            <h1 class="pt-lg-2 mb-2">Booking History</h1>
            <table class="mb-lg-5">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Vehicle Name</th>
                        <th>Email</th>
                        <th>phone Number</th>

                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookeds as $booked)
                        <tr class="even-row">
                            <td>2022-12-01</td>

                            <td>{{ $booked->name }}</td>
                            <td>{{ $booked->car ? $booked->car->carName : '' }}</td>
                            <td>{{ $booked->email }}/td>
                            <td>{{ $booked->phone }}</td>

                            <td>{{ $booked->status }}</td>
                        </tr>



                </tbody>
                @endforeach
            </table>
        </div>
        <h1 class="pt-lg-2 mb-2">Rent History</h1>
        <table class="mb-lg-5">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User Name</th>
                    <th>Vehicle Name</th>
                    <th>Email</th>
                    <th>phone Number</th>
                    <th>price</th>
                    <th>Action</th>


                </tr>
                @foreach ($rents as $rent)
            </thead>
            <tbody>
                <tr class="even-row">
                    <td>2022-12-01</td>

                    <td>{{ $rent->name }}</td>
                    <td>{{ $rent->car ? $rent->car->carName : '' }}</td>
                    <td>{{ $rent->email }}</td>
                    <td>{{ $rent->phone }}</td>
                    <td>{{ $rent->car ? $rent->car->prize : '' }}</td>
                    <td>{{ $rent->status }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
