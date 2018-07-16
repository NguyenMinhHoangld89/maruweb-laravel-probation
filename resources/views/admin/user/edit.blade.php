@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">Edit user {{$user->name}}</h5>
        <div class="card-body">
            <form action="{{route('users.update',$user)}}" method="post" enctype="multipart/form-data" id="edit">
                <input type="hidden" name="_method" value="PUT">
                @include('admin.user.partial')
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click', '#edit', function () {
            var dateString = document.getElementById('datepicker').value;
            var myDate = new Date(dateString);
            var today = new Date();
            if ( myDate > today ) {
                $('#datepicker').after('<p>You cannot enter a date in the future!.</p>');
            }
        });
        $(document).on('click', '#submit', function () {
            var dateString = document.getElementById('datepicker').value;
            var myDate = new Date(dateString);
            var today = new Date();
            if ( myDate > today ) {
                $('#datepicker').after('<p>You cannot enter a date in the future!.</p>');
            }
        });
    </script>
@endsection