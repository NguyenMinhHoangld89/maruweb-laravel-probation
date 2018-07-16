@extends('admin.master')
@section('content')
    <br>
    <div class="card">
        <h5 class="card-header">
            Products
            <a href="{{route('products.create')}}">
                <button class="btn btn-primary btn-success float-right">ADD NEW</button>
            </a>
        </h5>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" name="name" placeholder="Product Name" class="form-control"><br>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="sku" placeholder="Product SKU" class="form-control"><br>
                    </div>
                    <div class="col-md-4">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="min_price" placeholder="Price From" class="form-control"><br>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="max_price" placeholder="Price To" class="form-control"><br>
                    </div>
                </div>
                <button class="filter btn btn-primary btn-sm">Search</button> &nbsp;&nbsp;
                <button class="reset btn btn-dark btn-sm">Reset</button>
                <br>
                <br>
            </div>
            <div id="ajax-content">
                @include('admin.product.ajax-get',['products'=>$products])
            </div>

        </div>
    </div>
@endsection
@if(count($products)>0)
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.filter').click(function (event) {
                getProducts();
            });
            jQuery('.reset').click(function (event) {
                $(':input').val('');
                $("select option:eq(0)").prop("selected", true);
                getProducts();
            });

            function getProducts(page = 1) {
                jQuery.get(
                    "{{url('/getProducts')}}",
                    {
                        name: jQuery('input[name="name"]').val(),
                        page: page
                    },
                    function (data) {
                        jQuery('#ajax-content').html(data);

                    }
                );
            }
            $('#ajax-content').on('click', '.pagination a', function() {
                event.preventDefault();
                getProducts($(this).html());
            });
        });
    </script>
@endsection
@endif
