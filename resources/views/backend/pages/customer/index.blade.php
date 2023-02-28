@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Customer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Customer <a href="{{ route('customer.create') }}"
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
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email-ID</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Given Vehicle</th>
                                <th scope="col">Vehicle Name</th>
                                <th scope="col">Billbook Photo</th>
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
        
                    @foreach ($customers as $customer)
                    <tr>
                                <th scope="row">{{ $customer->id }}</th>
                                <td>{{ $customer->customerName }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->type }}</td>
                                <td>{{ $customer->Name }}</td>
                                <td>
                                    <img src="{{ asset($customer->image) }}" alt="" height="50px">
                                </td>
                               
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('customer.edit', $customer->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    
                </table>
                <!-- End Default 
                  
@endsection