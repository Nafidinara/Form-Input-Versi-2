@extends('base')
@section('content')
    <div class="container" style="margin-top: 8%;">
        <div class="card mb-3">
            <img class="card-img-top" src="{{asset('app/'.$data->foto)}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title font-weight-bold">{!! $data->judul !!}</h2>
                <p class="card-text">{!! $data->isi !!}</p>
                <p class="card-text"><small class="text-muted">{{'Last Update : '.$data->updated_at}}</small></p>
            </div>
            <div class="card-footer text-muted">
                {{'Di Publish pada : '.$data->created_at}}
            </div>
        </div>
    </div>
@endsection
