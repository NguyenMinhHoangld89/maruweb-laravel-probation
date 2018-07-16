@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">Edit Category {{$category->name}}</h5>
        <div class="card-body">
            <form action="{{route('categories.update',$category)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @include('admin.category.partial')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection