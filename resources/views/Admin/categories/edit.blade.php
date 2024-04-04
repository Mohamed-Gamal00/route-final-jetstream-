@extends('Admin.layout')

@section('body')
    @include('errors')
    {{-- @include('admin.success') --}}


    <form method="POST" action="{{ route('category-update',$category->id) }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="form-group">
            <label for="exampleInputEmail1">category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control text-white"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">category desc</label>
            <textarea type="text" name="desc" class="form-control text-white" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Enter desc">{{ $category->desc }}</textarea>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
