@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">
            Users
            <a href="{{route('users.create')}}">
                <button class="btn btn-primary btn-success float-right">ADD NEW</button>
            </a>
        </h5>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" name="name" placeholder="User Name" class="form-control"><br>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="email" placeholder="User Email" class="form-control"><br>
                    </div>
                </div>
                <button class="filter btn btn-primary btn-sm">Search</button> &nbsp;&nbsp;
                <button class="reset btn btn-dark btn-sm">Reset</button>
                <br>
                <br>
            </div>
            <div id="ajax-content">
                @include('admin.user.ajax-get',['users'=>$users])
            </div>

        </div>
    </div>
@endsection
@if(count($users)>0)
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.filter').click(function (event) {
                getUsers();
            });
            jQuery('.reset').click(function (event) {
                $(':input').val('');
                getUsers();
            });

            function getUsers(page = 1) {
                jQuery.get(
                    "{{url('/getUsers')}}",
                    {
                        name: jQuery('input[name="name"]').val(),
                        email: jQuery('input[name="email"]').val(),
                        page: page
                    },
                    function (data) {
                        jQuery('#ajax-content').html(data);

                    }
                );
            }
            $('#ajax-content').on('click', '.pagination a', function() {
                event.preventDefault();
                getUsers($(this).html());
            });
        });

        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
@endif
