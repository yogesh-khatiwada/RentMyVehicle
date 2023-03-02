@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Customer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">message</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">Add Customer <a href="{{ route('customer.create') }}"
                            class="btn btn-sm btn-primary">Add New</a></h5> --}}
                    <!-- Default Table -->
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>success: </strong> {{ session('success') }}
                    </div>
                @endif
                    <table class="table">
                        <thead>
                            <tr>
                           
                                <th scope="col">User Name</th>
                                <th scope="col">Email-ID</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
        
                    @foreach ($messages as $message)
                    <tr>
                               
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                
                               
                                <td>
                                    {{-- <a class="btn btn-secondary" href="{{ route('customer.edit', $customer->id) }}" --}}

                                        {{-- role="button">Edit</a> --}}
                                        <form action="{{ route('message.destroy', $message->id) }}" method="POST">
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