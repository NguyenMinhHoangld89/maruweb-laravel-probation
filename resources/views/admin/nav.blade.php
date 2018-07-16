<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%">
    <a class="navbar-brand" href="#">Maruweb</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/products')}}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/categories')}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/users')}}">Users</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <a class="glyphicon glyphicon-log-out" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</nav>