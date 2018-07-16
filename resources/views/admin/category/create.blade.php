@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">Create Category</h5>
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="post">
                @include('admin.category.partial')
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection