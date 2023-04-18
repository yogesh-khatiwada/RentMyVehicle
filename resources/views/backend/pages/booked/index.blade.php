@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Booked Index</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Car Booked</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Booked Table</h5>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>success: </strong> {{ session('success') }}
                        </div>
                    @endif
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vehicle Name</th>
                                <th scope="col">LicesencePhoto</th>
                                <th scope="col">Citizenship Front Photo</th>
                                <th scope="col">Citizenship Back Photo</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookeds as $booked)
                                {{-- {{ dd($bookeds) }} --}}
                                <tr>
                                    <th scope="row">{{ $booked->id }}</th>
                                    <td>{{ $booked->name }} <span class="badge bg-dark">{{ $booked->status }}</span></td>
                                    <td>{{ $booked->address }}</td>
                                    <td>{{ $booked->phone }}</td>
                                    <td>{{ $booked->email }}</td>
                                    <td>
                                        <span class="">{{ $booked->car ? $booked->car->carName : '' }}</span>
                                    </td>
                                    {{-- <a class="btn btn-info" href="{{ asset($booked->resume) }}" target="_blank"> --}}
                                    {{-- <i class="fa fa-eye" aria-hidden="true"></i> View</a> --}}
                                    <td>
                                        <a class="btn btn-info" href="{{ asset($booked->LicesencePhoto) }}"
                                            target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ asset($booked->citizenship) }}" target="_blank"><i
                                                class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ asset($booked->citizenshib) }}" target="_blank"><i
                                                class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </td>

                                    <td>
                                        @if ($booked->status == 'accepted')
                                            <a class="btn btn-danger"
                                                href="{{ route('bookedcar.index.update', ['type' => 'cancel', 'id' => $booked->id]) }}">Cancel</a>
                                        @else
                                            {{-- <a class="btn btn-info"
                                        href="{{ route('applyjob.index.update', ['type' => 'pending', 'id' => $apply->id]) }}">Pending</a> --}}
                                            <a class="btn btn-dark"
                                                href="{{ route('bookedcar.index.update', ['type' => 'accepted', 'id' => $booked->id]) }}">Accepted</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('bookedcar.index.update', ['type' => 'cancel', 'id' => $booked->id]) }}">Cancel</a>
                                        @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </section>
@endsection
