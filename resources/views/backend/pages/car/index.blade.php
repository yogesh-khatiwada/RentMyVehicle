@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Car</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Car</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add cars <a href="{{ route('car.create') }}"
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
                                <th scope="col">Car Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Model</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total Day</th>
                                <th scope="col">Added by</th>
                                 <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
                        @foreach ($cars as $car)
                            <tr style="{{$car->status =='notavailable'? 'background-color:red; color:#fff;':'' }}">

                                <th scope="row">{{ $car->id }}</th>
                                <td>{{ $car->carName }}</td>
                                <td>
                                    <img src="{{ asset($car->image) }}" alt="" height="50px">
                                </td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->quantity}}</td>
                                <td>{{ $car->prize}}</td>
                                <td>{{ $car->date }}</td>
                                <td>{{ $car->day }}</td>
                                <td>{{ $car->added }}</td>
                                <td><button class="btn">
                                        Status <span class="badge bg-primary">{{ $car->status }}</span>
                                    </button></td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('car.edit', $car->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('car.destroy', $car->id) }}" method="POST">
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