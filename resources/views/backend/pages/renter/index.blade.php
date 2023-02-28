@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Renter</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Renter</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add renter user <a href="{{ route('renter.create') }}"
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
                                <th scope="col">Renter Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Age</th>
                                <th scope="col">Temporary Address</th>
                                <th scope="col">Permanent Address</th>
                                <th scope="col">certizenship photo Front</th>
                                <th scope="col">certizenship photo Back</th>
                                <th scope="col">licesence photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
                        @foreach ($renters as $renter)
                            <tr>
                                <th scope="row">{{ $renter->id }}</th>
                                <td>{{ $renter->name }}</td>
                                <td>{{ $renter->email }}</td>
                                <td>{{ $renter->number }}</td>
                                <td>{{ $renter->age }}</td>
                                <td>{{ $renter->tadd }}</td>
                                <td>{{ $renter->padd }}</td>
                                <td>
                                   
                                    <img src="{{ asset($renter->c_image) }}" alt="" height="50px">
                                </td>
                                <td>
                                   
                                    <img src="{{ asset($renter->b_image) }}" alt="" height="50px">
                                </td>
                                <td>
                                    <img src="{{ asset($renter->l_image) }}" alt="" height="50px">
                                </td>
                                
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('renter.edit', $renter->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('renter.destroy', $renter->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        
                                </td>
                            </tr>
                        </form>
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