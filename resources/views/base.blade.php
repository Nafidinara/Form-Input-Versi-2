<!DOCTYPE html>
<html lang="en">
<head>
    <title>KesbangPolNTT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('resources/owlcarousel/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('resources/owlcarousel/dist/assets/owl.theme.default.css')}}">
    <script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
    <script src="{{asset('resources/bootstrap-4.3.1-dist/js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/assets/css/styleku.css')}}">
    <link rel="stylesheet" href="{{asset('resources/bootstrap-4.3.1-dist/css/bootstrap.css')}}">
    <script src="{{asset('resources/owlcarousel/src/js/owl.carousel.js')}}"></script>
    <script src="{{url('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    <script src="{{url('https://use.fontawesome.com/9564038555.js')}}"></script>
</head>
<body>
@include('sweet::alert')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('resources/assets/img/logo.jpeg')}}" alt=""><strong>KesbangPol</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('form')}}">Input Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('table')}}">Lihat Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('berita/table')}}">Olah Berita</a>
            </li>
        </ul>
    </div>
</nav>

<div class="" style="margin-top: 81px;">
    @yield('content')
</div>

<hr style="margin-top: 15%">

<div>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
</div>
</body>
</html>
