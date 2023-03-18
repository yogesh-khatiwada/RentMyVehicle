@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Testimonial</li>
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
                    {{-- <div class="alert alert-success" role="alert">
                        <strong>success: </strong> {{ session('success') }}
                    </div> --}}
                    <table class="table">
                        <thead>
                            <tr>
                           
                                <th scope="col">User Name</th>
                                <th scope="col">Email-ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Testimonials</th>
                                
                                <th scope="col">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
        
                    @foreach ($testimonials as $testimonial)
                    <tr>
                         <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->email }}</td>
                                <td>
                                    <img src="{{ asset($testimonial->image) }}" alt="" height="50px">
                                </td>
                                      
                                <td>{{ $testimonial->testimonial }}</td>
                                
                               
                                <td>
                                    {{-- <a class="btn btn-secondary" href="{{ route('customer.edit', $customer->id) }}" --}}

                                        {{-- role="button">Edit</a> --}}
                                        <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                            <a class="btn btn-outline-primary" href="{{ route('admin.testimonial.index')}}" role="button">Post</a>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    
                </table>
                <!-- End Default 
                  
@endsection