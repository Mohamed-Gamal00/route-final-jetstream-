@extends('Admin.layout')

@section('body')
    @include('errors')
    {{-- @include('admin.success') --}}


    <form method="POST" action="{{ route('update',$product->id) }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="exampleInputEmail1">product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control text-white"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">product desc</label>
            <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter desc">{{ $product->desc }}</textarea>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">product Price</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control text-white"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">product quantity</label>
            <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control text-white"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Category name</label>
            <select class="form-select" name="category_id" id="id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">product image</label>
            <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter email">

            <img class="my-2" width="200" src="{{ asset("storage/$product->image") }}" alt="img">

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
