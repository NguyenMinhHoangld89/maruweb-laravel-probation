<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<section class="nav">
    @include('admin.nav')
</section>
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.delete').click(function (event) {
            event.preventDefault();
            var _id = $(this).attr('data-id');
            if (confirm('Are you sure?' + _id)) {
                jQuery('#delete-' + _id).submit();
            }
        });
    });
</script>
@yield('script')
</body>
</html>