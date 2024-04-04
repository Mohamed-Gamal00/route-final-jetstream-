@extends('Admin.layout')
@section('body')
    @include('errors')
    {{-- @include('admin.success') --}}



    <a class="btn btn-outline-info mb-lg-5" href="{{ url('category/create') }}">
        <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Create New Category</span>
    </a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Created_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorty)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $categorty->name }}</td>
                    <td>{{ $categorty->desc }}</td>
                    <td>{{ $categorty->created_at }}</td>
                    <td>
                        <a class="btn btn-outline-success " href="{{ route('category-details', $categorty->id) }}">show</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
