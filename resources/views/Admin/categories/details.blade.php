@extends('Admin.layout')

@section('body')
    <div class="best-features about-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mx-lg-5">
                        <h4 class="mb-2"> {{ $category->name }}</h4>
                        <p>description : {{ $category->desc }}</p>
                        <div class="d-flex">
                            <a href="{{url("categories/edit/$category->id")}}" class="btn  btn-outline-success mr-3 "> edit
                            </a>

                            <form class="mx-2" action="{{ url("category/delete/$category->id") }}" method="post">
                                @csrf
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="btn btn-outline-danger ">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
