@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add contact detail <a href="{{ route('contact.create') }}"
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
                                <th scope="col">Contact number</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Location</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tr>
                    </thead>
                    
                        @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->location}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('contact.edit', $contact->id) }}"

                                        role="button">Edit</a>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
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