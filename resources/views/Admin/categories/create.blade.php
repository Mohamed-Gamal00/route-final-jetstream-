@extends('Admin.layout')

@section('body')
    @include('errors')
    {{-- @include('admin.success') --}}


    <form method="POST" action="{{ route('category-store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" name="name" class="form-control text-white" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter name">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Category desc</label>
            <textarea type="text" name="desc" class="form-control text-white" placeholder="Enter desc"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
