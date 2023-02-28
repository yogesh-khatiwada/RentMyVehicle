@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Offer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">offer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add offer <a href="{{ route('offer.create') }}"
                            class="btn btn-sm btn-primary">Add New</a></h5>
                    <!-- Default Table -->
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>success: </strong> {{ session('success') }}
                    </div>
                @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vehicle Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Model</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
                        @foreach ($offers as $offer)
                            <tr>
                                <th scope="row">{{ $offer->id }}</th>
                                <td>{{ $offer->vehicleName }}</td>
                                <td>
                                    <img src="{{ asset($offer->image) }}" alt="" height="50px">
                                </td>
                                <td>{{ $offer->model }}</td>
                                
                                <td>{{ $offer->prize}}</td>
                               
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('offer.edit', $offer->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('bike.destroy', $offer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    
                </table>
                <!-- End Default 
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </section>
@endsection