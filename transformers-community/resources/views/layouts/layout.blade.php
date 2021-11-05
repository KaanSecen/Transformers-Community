<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Transformers Community</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('/css/layout.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="padding: 25px;">
    <nav class="rounded navbar navbar-expand-lg navbar-dark" id="navbar-menu">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{url('/img/TC.svg')}}" alt="" width="35" height="30" class="d-inline-block align-text-top">
                <span style="font-size: 16px; font-family: DN Pro DN Pro Bold;color: #FC9C72;">TRANSFORMERS<span style="font-size: 12px;color: #806CFF;">COMMUNITY</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="navbar-menu-icon">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto me-auto" id="font-med-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('home')" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('over-ons')" href="#">Over ons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('wordt-transformer')" href="#">Word Transformer!</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link @yield('contact')" href="#">Contact</a>
                    </li>
                </ul>
                @if (Route::has('login'))
                <div class="d-flex justify-content-between">
                    @auth
                    <a href="{{ url('/dashboard') }}"><button class="btn rounded" type="button" id="button-aanmelden">Dashboard</button></a>
                    @else
                    <a href="{{ route('login') }}"><button class="btn rounded mr-3" type="button" id="button-login">Login</button></a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"><button class="btn rounded" type="button" id="button-aanmelden">Aanmelden</button></a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="rounded container-fluid" id="container-header">
        <div class="row">
            <div clas="col-md-4">
                <div class="row" style="padding:25px">
                    <div>
                        @yield('first-item')
                    </div>
                    <div>
                        @yield('second-item')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        @yield('third-item')
    </div>

    <div class="col-md-8" id="posts">
        @yield('content')
    </div>
    </div>
    </div>
    <div class=" rounded container-fluid footer-bottom">
        <div class="row">
            <div class="col pt-3">
                <span style="color: #FFF;">© 2021 </span><span style="font-size: 16px; font-family: DN Pro DN Pro Bold;color: #FC9C72;">TRANSFORMERS<span style="font-size: 12px;color: #806CFF;">COMMUNITY</span></span>
            </div>
        </div>
</body>

</html>