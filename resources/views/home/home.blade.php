@extends('base')
@section('content')
    <style>
        .header{
            width: 100%;
            height: 750px;
        }
    </style>
    @include('sweet::alert')
    <div class="header">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="container">
                    <div class="carousel-caption text-header d-none d-block">
                        <h1>Judul Website Ada Disini</h1>
                        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</h5>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block gambar-header w-100" src="{{asset('resources/assets/img/gb03.jpeg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 gambar-header" src="{{asset('resources/assets/img/gb04.jpeg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 gambar-header" src="{{asset('resources/assets/img/gb05.jpeg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container-fluid">
        <hr width="50%">
        <div align="center" class="mb-4">
            <h2>Berita Terkini</h2>
        </div>
        <hr width="60%" class="mb-4">
        <div class="row">
            <div class="col-md-8 card-berita">
                @if(is_array($data) || is_object($data))
                    @foreach($data as $key=>$datas)
                        <div class="card berita mb-4">
                            <div>
                                <img style="max-width: 194px;height: 178px;" src="{{asset('app/'.$datas->foto)}}" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{\Illuminate\Support\Str::limit($datas->judul,80)}}</h5>
                                <p class="card-text">{!!\Illuminate\Support\Str::limit($datas->isi,120)!!}</p>
                                <a href="{{url('berita/detail/'.$datas->berita_id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                    <h5>{{ $data->links() }}</h5>
            </div>
            <div class="col-md-4 card-kanan">
                <div class="card" style="text-align: center">
                    <div class="card-header">
                        <h5>Follow Us</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"><i><img style="height: 30px; width: 30px;" src="{{asset('resources/assets/img/instagram.svg')}}" alt=""></i> Instagram</a></li>
                        <li class="list-group-item"><a href="#"><i><img style="height: 30px; width: 30px;" src="{{asset('resources/assets/img/facebook.svg')}}" alt=""></i> Facebook</a></li>
                        <li class="list-group-item"><a href="#"><i><img style="height: 30px; width: 30px;" src="{{asset('resources/assets/img/twitter.svg')}}" alt=""></i>Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <hr class="featurette-divider">
            <div class="row featurette">
                <div style="padding: 70px 0" class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('resources/assets/img/gb06.jpeg')}}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2" style="padding: 70px 0">
                    <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('resources/assets/img/gb06.jpeg')}}" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7" style="padding: 70px 0">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{asset('resources/assets/img/gb04.jpeg')}}" alt="Generic placeholder image">
                </div>
            </div>
        </div>

    </div>
    <script>
        $('.carousel').carousel({
            interval: 3000
        })
    </script>
@endsection
