@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">
            Categories
            <a href="{{route('categories.create')}}">
                <button class="btn btn-primary btn-success float-right">ADD NEW</button>
            </a>
        </h5>
        <div class="card-body">
            <div>
                <input type="text" name="name" placeholder="Enter name of category" class="form-control"><br>
                <button class="filter btn btn-primary btn-sm">Search</button> &nbsp;&nbsp;
                <button class="reset btn btn-dark btn-sm">Reset</button>
                <br><br>
            </div>
            <div id="ajax-content">
                @include('admin.category.ajax-get',['categories'=>$categories])
            </div>

        </div>
    </div>
@endsection
@if(count($categories)>0)
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.filter').click(function (event) {
                getCategories();
            });
            jQuery('.reset').click(function (event) {
                jQuery('input[name="name"]').val('');
                getCategories();
            });

            function getCategories(page = 1) {
                jQuery.get(
                    "{{url('/getCategories')}}",
                    {
                        name: jQuery('input[name="name"]').val(),
                        category_id: jQuery('select[name="category_id"]').val(),
                        sku: jQuery('input[name="sku"]').val(),
                        min_price: jQuery('input[name="min_price"]').val(),
                        max_price: jQuery('input[name="max_price"]').val(),
                        page: page
                    },
                    function (data) {
                        jQuery('#ajax-content').html(data);

                    }
                );
            }
            $('#ajax-content').on('click', '.pagination a', function() {
                event.preventDefault();
                getCategories($(this).html());
            });
        });
    </script>
@endsection
@endif