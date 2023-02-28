@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Bike</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Bike</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add cars <a href="{{ route('bike.create') }}"
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
                                <th scope="col">Bike Name</th>
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
                    
                        @foreach ($bikes as $bike)
                            <tr>
                                <th scope="row">{{ $bike->id }}</th>
                                <td>{{ $bike->bikeName }}</td>
                                <td>
                                    <img src="{{ asset($bike->image) }}" alt="" height="50px">
                                </td>
                                <td>{{ $bike->model }}</td>
                                <td>{{ $bike->quantity}}</td>
                                <td>{{ $bike->prize}}</td>
                                <td>{{ $bike->date }}</td>
                                <td>{{ $bike->day}}</td>
                                <td>{{ $bike->User ? $bike->User->name : '' }}</td>
                                <td><button class="btn">
                                        Status <span class="badge bg-primary">{{ $bike->status }}</span>
                                    </button></td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('bike.edit', $bike->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('bike.destroy', $bike->id) }}" method="POST">
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