@extends('Admin.layout')

@section('body')
    <div class="best-features about-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <img class="w-100" src="{{ asset("storage/$product->image") }}" alt="img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mx-lg-5">
                        <h4 class="mb-2"> {{ $product->name }}</h4>
                        <p>description : {{ $product->desc }}</p>
                        <p>category : {{ $product->category->name }}</p>
                        <p>price : {{ $product->price }}</p>
                        <p>quantity : {{ $product->quantity }}</p>
                        <div class="d-flex">
                            <a href="{{url("products/edit/$product->id")}}" class="btn  btn-outline-success mr-3 "> edit
                            </a>

                            <form class="mx-2" action="{{ route("product-delete",$product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger ">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
