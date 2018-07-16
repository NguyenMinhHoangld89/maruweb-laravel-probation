@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">Create User</h5>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @include('admin.user.partial')
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection