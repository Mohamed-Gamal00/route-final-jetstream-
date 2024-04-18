@extends('Admin.layout')
@section('body')
    @include('errors')
    {{-- @include('admin.success') --}}



    <a class="btn btn-outline-info mb-lg-5" href="{{ url('products/create') }}">
        <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Create New Product</span>
    </a>

    @if (Session::has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Desc</th>
                <th scope="col">image</th>
                <th scope="col">Aciton</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->desc }}</td>
                    <td><img src="{{ asset("storage/$product->image") }}" width="100px" alt="" srcset=""></td>
                    <td>
                        <a class="btn btn-outline-success " href="{{ route('details', $product->id) }}">show</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
