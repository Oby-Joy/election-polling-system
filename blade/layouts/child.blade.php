<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbarmain navbar-light">
        <div class="container">
            <div class="logo col-md-5">
                <a href="" class="navbar-brand">
                    Voting System
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
            </button>
            <div class="collapse navbar-collapse col-md-7" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-5">
                        <a href="" class="nav-link"></a>
                    </li>
                    <li class="nav-item mx-5">
                        <a href="/blog" class="nav-link"></a>
                    </li>
                    <li class="nav-item mx-5">
                        <a href="/contact" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href= "/" class="nav-link active" aria-current="page">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                    </li> 
                    <li class="nav-item mx-5">
                        <div>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>                                
                </ul>
            </div>
        </div>
    </nav><hr/>


    @yield('content')

    <script src="{{ asset('js/bootstrap.js') }}"></script>

</body>
</html>