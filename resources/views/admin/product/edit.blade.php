@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">Edit Product {{$product->name}}</h5>
        <div class="card-body">
            <form action="{{route('products.update',$product)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @include('admin.product.partial')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection